const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      list: [],
      newTask: "",
    };
  },
  methods: {
    getList() {
      axios
        .get(this.apiUrl)
        .then((res) => {
          console.log(res.data);
          this.list = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    addTask() {
      // const data = {
      //   task: this.newTask,
      // };
      if (this.newTask !== "") {
        const data = new FormData();
        data.append("task", this.newTask);
        axios
          .post(this.apiUrl, data)
          .then((res) => {
            this.list = res.data;
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
  },
  mounted() {
    this.getList();
  },
}).mount("#app");

const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      list: [],
      newTask: "",
      myAll: true,
      important: false,
      done: false,
      notDone: false,
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
    deleteTask(index) {
      const data = new FormData();
      data.append("deletetask", index);
      axios
        .post(this.apiUrl, data)
        .then((res) => {
          this.list = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateTask(index) {
      const data = new FormData();
      data.append("updatetask", index);
      axios
        .post(this.apiUrl, data)
        .then((res) => {
          this.list = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    importantTask(index) {
      const data = new FormData();
      data.append("importanttask", index);
      axios
        .post(this.apiUrl, data)
        .then((res) => {
          this.list = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    flagSwitch() {
      this.myAll = false;
      this.important = false;
      this.done = false;
      this.notDone = false;
    },
  },
  mounted() {
    this.getList();
  },
}).mount("#app");

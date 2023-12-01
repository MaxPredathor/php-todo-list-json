<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.x/dist/vue.global.prod.js"></script>
    <!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> -->
    <script src="js/script.js" type="module"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>To Do List</title>
</head>

<body>
    <div class="wrapper">
        <div class="mydiv" id="app">
            <section class="todo-list py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-1">Todo List</h1>
                            <div class="form-check">
                                <input class="form-check-input" @click="flagSwitch(), myAll = true" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" @click="flagSwitch(), done = true" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tasks Done
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" @click="flagSwitch(), notDone = true" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Tasks Not Done
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" @click="flagSwitch(), important = true" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Important Tasks
                                </label>
                            </div>
                            <ul class="list-group list-group-flush rounded">
                                <li v-show="(myAll) || (item.done == false && notDone) || (item.done == true && done) || (item.important == true && important)" v-for="(item, index) in list" :key="index" 
                                    :class="{'text-decoration-line-through': item.done, 'important': item.important}" 
                                    @click.stop="updateTask(index)" 
                                    class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                        {{ item.text }} 
                                        </div>                         
                                        <div class="d-flex justify-content-between">
                                            <span @click.stop="importantTask(index)">
                                                <i class="fa-solid fa-triangle-exclamation" style="color: #b43127;"></i>
                                            </span>
                                            <span @click.stop="deleteTask(index)">
                                                <i class="fa-solid fa-recycle ps-2" style="color: #3b8736;"></i>
                                            </span>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="add-todo">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Inserisci elemento..."
                                    aria-label="Inserisci nuovo elemento per la lista"
                                    aria-describedby="button-add" @keyup.enter="addTask" v-model="newTask">
                                <button class="btn" type="button"
                                    id="button-add" @click="addTask()">Inserisci
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
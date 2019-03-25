<template>
    <div class="container">
        <h2>Project: {{projectName}}</h2>
        <ul class="list-group ">
            <li v-for="task in tasks" class="list-group-item ">
                {{task.body}}
            </li>
        </ul>
        <br>
        <input type="text" v-model="newTask" @blur="addNewTask">
    </div>
</template>

<script>
    //console.log(window.location.pathname[window.location.pathname.length-1]);
    import axios from 'axios';
    export default {
        data() {
            return {
                newTask: '',
                projectName: '',
                tasks: [],
                wildCardParm: 1,
            }
        },
        created() {
          this.wildCardParm = window.location.pathname[window.location.pathname.length-1];
          axios.get(`/getjsonprojects/${this.wildCardParm}`)
              .then(response => {

                  this.projectName = response.data[0].name;
                  this.tasks = response.data[0].tasks;
              });
          window.Echo.private('tasks.'+this.wildCardParm)
              .listen('TaskCreated', e => {
                    this.tasks.push({body: e.task.body});
               })
        },
        mounted() {

        },
        methods: {
            addNewTask() {
                if (this.newTask.length === 0) {
                    return;
                }
                axios.post('/tasks', { body: this.newTask, project_id: this.wildCardParm });
                this.tasks.push({body: this.newTask});
                this.newTask = ''
            }
        }
    }
</script>

<template>
    <div class="container">
        <h2>Project: {{projectName}}</h2>
        <ul class="list-group ">
            <li v-for="task in tasks" :key="task.id"  class="list-group-item ">
                {{task.body}}
            </li>
        </ul>
        <br>
        <input type="text" v-model="newTask" @blur="addNewTask" @keydown="tabParticipants">
        <p v-if="activePeer" v-text="activePeer.name + ' is typing...'"> is typing.. </p>
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
                wildCardParm: 1, /* This is the project ID */
                activePeer: false,
                typingTimer: false,
            }
        },
        created() {
          this.wildCardParm = window.location.pathname[window.location.pathname.length-1];
          axios.get(`/getjsonprojects/${this.wildCardParm}`)
              .then(response => {
                  // console.log('Response  === ', response);
                  this.projectName = response.data[0].name;
                  this.tasks = response.data[0].tasks;
              });
          window.Echo.private('tasks.'+this.wildCardParm)
              .listen('TaskCreated', e => {
                    this.tasks.push({body: e.task.body});
               })
              .listenForWhisper('typing', e => {

                    this.activePeer = e;                    
                    
                    if (this.typingTimer) {
                        clearInterval(this.typingTimer);
                    }
                    this.typingTimer = setTimeout(() => {
                        this.activePeer = false;
                    }, 3000);
               });
        },
        mounted() {

        },
        methods: {
            
            addNewTask() {
                this.activePeer = false;
                if (this.newTask.length === 0) {
                    return;
                }
                axios.post('/tasks', { body: this.newTask, project_id: this.wildCardParm });
                this.tasks.push({body: this.newTask});
                this.newTask = ''
            },
                tabParticipants() {
                const app = JSON.parse(window.App);
                window.Echo.private('tasks.'+this.wildCardParm)
                    .whisper('typing', {
                        name: app.user.name /* This name was set in welcome.blade.php */
                    })
            }

        }
    }
</script>

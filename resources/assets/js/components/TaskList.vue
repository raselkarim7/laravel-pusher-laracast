<template>
    <div class="container">
        <ul>
            <li v-for="task in tasks">
                @{{task}}
            </li>
        </ul>
        <input type="text" v-model="newTask" @blur="addNewTask">
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                newTask: '',
                tasks: [],
            }
        },
        created() {
          axios.get('/tasks')
              .then(response => {
                  // console.log('Response Successful ==== ');
                  this.tasks = response.data
              });
        },
        mounted() {
            // console.log('Component mounted.')
        },
        methods: {
            addNewTask() {
                // console.log('add new task called');
                if (this.newTask.length === 0) {
                    return;
                }
                axios.post('/tasks', { body: this.newTask });
                this.tasks.push(this.newTask);
                this.newTask = ''
            }
        }
    }
</script>

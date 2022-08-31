<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Задать вопрос</div>
                    <div class="card-body">
                        <form @submit.prevent="storeTicket">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input v-model="form.email" type="email" class="form-control" id="email">
                                <small id="emailHelp" class="form-text text-muted">На указанный Email придет ответ от наших сотрудников</small>
                            </div>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input v-model="form.name" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="message">Вопрос</label>
                                <textarea v-model="form.message" class="form-control" id="message" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить вопрос</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { store } from '../../api'
import showErrors from '../mixins/showErrors'
export default {
    name: 'TicketCreate',
    mixins: [showErrors],
    data() {
        return {
            form: {
                email: '',
                name: '',
                message: ''
            }
        }
    },
    methods: {
        storeTicket() {
            store('tickets', this.form).then((res) => {
                this.$toast.success(res.data.success)
                this.form.email = ''
                this.form.name = ''
                this.form.message = ''
            }).catch((e) => {
                this.showErrors(e)
            })
        }
    }
}
</script>

<style scoped>

</style>

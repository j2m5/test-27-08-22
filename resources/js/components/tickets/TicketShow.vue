<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Вопрос #{{ ticket.id }}
                        статус: {{ ticket.status | getStatus }}
                    </div>
                    <div class="card-body">
                        <div>{{ ticket.email }}</div>
                        <div>{{ ticket.name }}</div>
                        <div>{{ ticket.message }}</div>
                        <div>{{ ticket.created_at }}</div>
                        <form v-if="!ticket.answer" @submit.prevent="storeAnswer">
                            <input v-model.number="form.ticket_id" type="hidden">
                            <div class="form-group">
                                <label for="message">Ответ</label>
                                <textarea v-model="form.message" class="form-control" id="message" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ответить</button>
                        </form>
                        <div v-else>
                            <hr>
                            <div><small>Ответ специалиста Службы поддержки</small></div>
                            <div>{{ ticket.answer.message }}</div>
                        </div>
                        <hr>
                        <div class="mt-2">
                            <router-link :to="{ name: 'TicketList' }">Вернуться к списку вопросов</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { show, store } from '../../api'
import showErrors from '../mixins/showErrors'
import getStatus from '../mixins/getStatus'
export default {
    name: 'TicketShow',
    mixins: [showErrors, getStatus],
    data() {
        return {
            ticket: {},
            form: {
                ticket_id: 0,
                message: ''
            }
        }
    },
    created() {
        this.getTicket()
    },
    methods: {
        getTicket() {
            show('tickets', this.$route.params.id).then((res) => {
                this.ticket = res.data.ticket || {}
                this.form.ticket_id = this.ticket.id
            })
        },
        storeAnswer() {
            store('answers', this.form).then((res) => {
                this.$toast.success(res.data.success)
                this.$router.push({ name: 'TicketList' });
            }).catch((e) => {
                this.showErrors(e)
            })
        }
    }
}
</script>

<style scoped>

</style>

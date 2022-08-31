<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список вопросов</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="type">Сортировать:</label>
                            <select v-model="query.type" class="form-control" id="type">
                                <option value="created_at@desc">по дате (по убыванию)</option>
                                <option value="created_at@asc">по дате (по возрастанию)</option>
                                <option value="status@desc">по статусу (по убыванию)</option>
                                <option value="status@asc">по статусу (по возрастанию)</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" @click="getTickets">Сортировать</button>
                        <ul v-if="tickets.length" class="list-group mt-3">
                            <li v-for="ticket in tickets" :key="ticket.id" class="list-group-item">
                                #{{ ticket.id }}
                                <router-link :to="{ name: 'TicketShow', params: { id: ticket.id } }">{{ ticket.email }}</router-link>
                                <small>({{ ticket.status | getStatus }})</small>
                                <small class="float-right">{{ ticket.created_at }}</small>
                            </li>
                        </ul>
                        <div v-else>Вопросов пока нет</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { index } from '../../api'
import getStatus from '../mixins/getStatus'
export default {
    name: 'TicketList',
    mixins: [getStatus],
    data() {
        return {
            tickets: [],
            query: {
                type: 'created_at@desc'
            }
        }
    },
    created() {
        this.getTickets()
    },
    methods: {
        getTickets() {
            const params = { type: this.query.type }
            index('tickets', { params }).then((res) => {
                this.tickets = res.data.tickets || []
            })
        }
    }
}
</script>

<style scoped>

</style>

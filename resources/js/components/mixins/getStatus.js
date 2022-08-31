export default {
    filters: {
        getStatus(status) {
            if (!status) return 'открыт'
            else return 'закрыт'
        }
    }
}

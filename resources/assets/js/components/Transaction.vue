<template>
    <div>
        {{transaction.description}}
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                transactionId: this.$route.params.transactionId,
                transaction: [],
                errors: []
            }
        },

        created() {
            axios.get('http://tahua.app/api/transactions/' + this.transactionId)
                .then(response => {
                    this.transaction = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
        }
    }
</script>

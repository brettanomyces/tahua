<template>
    <div>
        <dl class="dl-horizontal">
            <dt>Date</dt>
            <dd>{{transaction.date}}</dd>
            <dt>Description</dt>
            <dd>{{transaction.description}}</dd>
            <dt>Date</dt>
            <dd>{{parseFloat(transaction.amount).toFixed(2)}}</dd>
            <dt>Tags</dt>
            <dd>{{transaction.tags}}</dd>
            <dt>Record</dt>
            <dd>{{transaction.record}}</dd>
        </dl>
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

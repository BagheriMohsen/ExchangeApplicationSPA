<template>
    <div class="col-12">
        <form @submit.prevent="updateNotif" class="row">
            <div class="col-sm-8">
                <div class="form-row flex-nowrap">
                    <div class="form-group">
                        <input v-model="notif.pair" type="text" class="form-control" id="currency" placeholder="ارز" disabled>
                    </div>
                    <div class="form-group">
                        <input v-model="notif.time_expire" type="text" class="form-control" id="" placeholder="مهلت">
                    </div>
                    <div class="form-group">
                        <input v-model="notif.endTime" type="text" class="form-control" id="" placeholder="زمان آمادگی">
                    </div>
                    <div class="mx-2">
                        <div class="radio">
                            <input type="radio" value="buy" v-model="notif.buy_sell" checked>
                            <label class="mr-1">خرید</label>
                        </div>
                        <div class="radio">
                            <input type="radio" value="sell" v-model="notif.buy_sell">
                            <label class="mr-2">فروش</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="">
                    <button type="submit" class="btn mx-1">Send</button>
                    <button @click="closeNotif" type="button" class="btn btn-warning mx-1">Close</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
  export default {
    name:'binary-inputs', 
    components: {
      
    },
    props:{
        notifInput:Object
    },
    data() {
      return {
          notif:this.notifInput,
      };
    },
    methods: {
        updateNotif(){
            this.$emit('updateNotif', this.notif);
        },
        closeNotif(){
            this.$emit('closeNotif', this.notif.id);
        },
       
    },
    mounted() {
     
    }
  };
</script>
<style scoped>
.form-group{
  width: 100px;
  padding: 0px 2px;
}
</style>

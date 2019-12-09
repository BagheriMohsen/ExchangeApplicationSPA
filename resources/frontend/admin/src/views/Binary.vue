<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div class="row justify-content-center">
                        <binary-inputs 
                          v-for="notifInput in notifInputs"
                          v-bind:key="notifInput.id" 
                          :notifInput="notifInput" 
                          @postNotif="postNotif"
                          @closeNotif="closeNotif"
                          >
                        </binary-inputs>
                      </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import BinaryInputs from '@/components/BinaryInputs.vue';
  export default {
   
    components: {
      BinaryInputs
    },
    data() {
      return {
        notifInputs:[]
      };
    },
    methods: {
      fetchNotifs(){
        this.$http.get('http://localhost:8000/binaries/')
          .then(res => {this.notifInputs = res.data;console.log(res.data)})
          .catch(e =>this.errors.push(e));
      },
      postNotif(value){
        this.$http.post('http://localhost:8000/binaries/store', {
          pair : value.pair,
          time_expire: value.expire,
          endTime: value.endTime,
          close : value.close,
          buy_sell : value.buy_sell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        });
        this.fetchNotifs();
      },
      closeNotif(id){
        this.$http.get('http://localhost:8000/binaries/close/' + id)
          .then(response => console.log(response.data))
          .catch(e => this.errors.push(e));
        this.fetchNotifs();
      },
    },
    created() {
      this.fetchNotifs();
    }
  };
</script>

<style scoped>
  .form-group{
    width: 150px;
  }
</style>

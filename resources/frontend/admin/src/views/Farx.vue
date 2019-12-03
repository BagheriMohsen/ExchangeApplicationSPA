<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
           <!-- فارکس -->
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div slot="header" class="bg-white row align-items-center">
                          <div class="col mb-3">
                          </div>
                      </div>
                      <div class="row justify-content-center">
                          <div class="col-12">
                            <form @submit.prevent="postNotif()">
                              <div class="form-row">
                                 <div class="form-group">
                                    <label for="currency">جفت ارز </label>
                                    <input v-model="notif.currency" type="text" class="form-control" id="currency">
                                </div>
                                <div class="form-group">
                                    <label for="currency"> قیمت شروع </label>
                                    <input v-model="notif.startPrice" type="text" class="form-control" id="">
                                </div>
                                <div class=" form-group">
                                  <label for="currency">حالت</label>
                                  <select v-model="notif.type" class="form-control" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="currency">عدد SL </label>
                                  <input v-model="notif.sl" type="text" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="currency">عدد TP </label>
                                    <input v-model="notif.tp" type="text" class="form-control" id="">
                                </div>
                                <div class="form-group mt-4">
                                  <button type="submit" class="btn btn-success">Send</button>
                                </div>
                                <div class="form-group mt-4">
                                  <button @click="notif.expire = !notif.expire" class="btn btn-danger">Expire</button>
                                </div>
                                <div class="form-group mt-4">
                                  <button @click="notif.close = !notif.close" class="btn btn-warning">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    components: {
     
    },
    data() {
      return {
        notif:{
          currency:'',
          startPrice:'',
          type:'',
          sl:'',
          tp:'',
          expire:false,
          close:false
        }
      };
    },
    methods: {
      saveNotif(){
        this.$http.post(`http://jsonplaceholder.typicode.com/posts`, {
          body: this.notif
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        })
      }
    },
    mounted() {
     
    }
  };
</script>
<style></style>

<template>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <div class="d-flex white">
                      <div class="px-2 ml-auto">{{notif.updated_at}}</div>
                      <div v-show="notif.buy_sell" class="px-2 bg-success white--text">{{notif.buy_sell}}</div>
                      <div v-if="!notif.close && !notif.expire" class="px-1 bg-info white--text">فعال</div>
                      <div v-if="notif.close" class="px-2 bg-danger white--text">Close</div>
                      <div v-if="notif.expire" class="px-2 bg-default white--text">Expire</div>
                    </div>
                    <div class="table-responsive white">
                         <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>ارز</th>
                                    <th>شروع</th>
                                    <th>حالت</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{notif.pair}}</td>
                                    <td>{{notif.startingPrice}}</td>
                                    <td>{{notif.forex_category_id}}</td>
                                    <td>{{notif.sl}}</td>
                                    <td>{{notif.tp}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
  import Pusher from 'pusher-js'
  export default {
    data () {
      return {
        notifs:[],
      }
    },
    methods:{
      fetchNotif(){
        this.$http.get('http://localhost:8000/forex/')
          .then(res => {
            this.notifs = res.data;
          })
          .catch(err => console.log(err));
      },
      subscribe(){
        let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
        pusher.subscribe('ForexNotif')
        pusher.bind('App\\Events\\ForexNotifEvent', data => {
          this.notifs = data.Forex;
          console.log(this.notifs); 
        })
      }
    },
    created () {
      this.fetchNotif();
      this.subscribe();
    }
  }
</script>

<style scoped>
  table td,table th{
    font-size: .75rem;
    /* color: #f3f3f3; */
  }
  table{
    width: 100%;
  }
  .col-12{
    padding-top: 2px;
    padding-bottom: 2px;
  }
  .bg-danger{
    background: #ff3547!important;
  }
  .bg-default{
    background: #616161!important;
  }
  .bg-info{
    background: #33b5e5;
  }
  .bg-success{
    background: #00C851;
  }
  div{
    font-size: .7rem;
  }
 </style>
<template>
    <section>
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <div class="d-flex white">
                      <div class="px-2 ml-auto">{{notif.created_at}}</div>
                      <div v-show="notif.buy_sell" class="px-2 bg-success white--text">{{notif.buy_sell}}</div>
                      <div v-if="!notif.close" class="px-1 bg-info white--text">فعال</div>
                      <div v-if="notif.close" class="px-2 bg-default white--text">Expire</div>
                    </div>
                    <div class="table-responsive white">
                         <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>ارز</th>
                                    <th>زمان</th>
                                    <th>آماده</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{notif.pair}}</td>
                                    <td>{{notif.time_expire}}</td>
                                    <td>{{notif.ready}}</td>
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
  export default {
    data () {
      return {
       notifs:[]
      }
    },
    methods:{
      fetchNotif(){
        this.$http.get('http://localhost:8000/binaries/')
          .then(res => {
            this.notifs = res.data;
          })
          .catch(err => console.log(err));
      }
    },
    created () {
        this.fetchNotif();
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
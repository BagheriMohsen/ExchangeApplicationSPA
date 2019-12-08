<template>
    <section>
        <!-- v-for="notif in notifs" v-bind:key="notif.pair" -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive" style="background:white">
                         <table class="table mx-auto">
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
                                    <!-- <td>{{notif.pair}}</td>
                                    <td>{{notif.startingPrice}}</td>
                                    <td>{{notif.forex_category_id}}</td>
                                    <td>{{notif.sl}}</td>
                                    <td>{{notif.tl}}</td> -->
                                    <td>sdfa</td>
                                    <td>sdfafds</td>
                                    <td>sdfafd</td>
                                    <td>sdfa</td>
                                    <td>dfsafas</td>
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
       notfis:[]
      }
    },
    methods:{
    //   fetchNotif(){
    //     this.$http.get('')
    //       .then(res => {
    //         this.notifs = res.data;
    //         console.log(this.notifs);
    //       })
    //       .catch(err => console.log(err));
    //   }
    },
    created () {
        this.fetchNotif();
    }
  }
</script>
 <style scoped>

 </style>
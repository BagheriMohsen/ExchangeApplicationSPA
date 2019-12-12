<template>
    <div>
       <div :class="{'bg-close':notif.close,'bg-expire': notif.expire}" class="d-flex bg-open notif_header">
            <div class="px-2 ml-auto d-flex flex-row">
              <div class="time-icon"><v-icon @click.stop="dialog = true" class="white--text" style="font">schedule</v-icon></div>
              <div class="mr-1 mt-1"> {{jalali_update_date}}</div>
            </div>
            <div v-if="notif.buy_sell" class="px-2" style="align-self: center;">{{notif.buy_sell}}</div>
            <div v-if="!notif.close && !notif.expire" class="px-2">فعال</div>
            <div v-if="notif.close" class="px-2" style="align-self: center;">ببند</div>
            <div v-if="notif.expire" class="px-2" style="align-self: center;">منقضی</div>
        </div>
        <v-dialog
          v-model="dialog"
          max-width="290"
        >
        <v-card>
          <v-card-text>
            تاریخ پیام:
            <br>
            {{notif.jalali_update}}
          </v-card-text>
          <v-card-text v-if="notif.close || notif.expire">
            تاریخ شروع پیام :
            <br>
            {{notif.jalali_create}}
          </v-card-text>
      </v-card>
        </v-dialog>
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
</template>

<script>

   
  var moment = require('jalali-moment');
  moment.locale('fa', { useGregorianParser: true });  
  export default {
    props:{
        notifInfo:Object
    },
    data () {
      return {
        notif : this.notifInfo,
        jalali_update_date:'',
        dialog: false,
      }
    },
    methods:{
      convertJalali(){
        this.jalali_update_date = moment(this.notif.updated_at).format('HH:mm:ss');
        this.notif.jalali_update = moment(this.notif.update_at).format('HH:mm:ss - YY/M/D');
        this.notif.jalali_create = moment(this.notif.created_at).format('HH:mm:ss - YY/M/D');
      },
      buySell :function(){
        if(this.notif.buy_sell == 'buy'){
          this.notif.buy_sell = 'خرید'
        }else if(this.notif.buy_sell == 'sell'){
          this.notif.buy_sell = 'فروش'
        }
      }
     
    },
    // computed(){
    //   this.notif.updated_at = moment(this.notif.updated_at).format('YYYY/M/D HH:mm:ss')
    // },
    created () {
      this.convertJalali();
      this.buySell;
      // this.fetchNotif();
      // this.subscribe();
      // this.convertToJalali();
    },
    updated(){
    },
    computed:{
      
    }
  }
</script>

<style scoped>
  table td{
    font-size: .7rem;
    width: 4rem;
    padding: 2px 0px;
  }
  table th{
    font-size: .6rem;
    width: 4rem;
    padding: 2px 0px;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  thead{
    border-bottom: 1px solid #c7c7c7;
  }
  .col-12{
    padding-top: 3px;
    padding-bottom: 3px;
  }
  .bg-close{
    background: #f44336!important;
  }
  .bg-open{
    background: #33b5e5;
  }
  .bg-expire{
    background: #37474F !important;
  }
  .bg-buySell{
    background: #00C851;
  }
  div{
    font-size: .7rem;
  }
  .notif_header{
    padding: 2px 2px;
    border-bottom: 1px solid #c7c7c7;
  }
  .time-icon i{
    font-size: 1rem;
  }
  .v-dialog > .v-card > .v-card__text{
    padding:0 18px 20px;
  }
 </style>
<template>
    <div>
       <div :class="{'bg-close':notifInfo.close,'bg-expire': notifInfo.expire}" class="d-flex bg-open notif_header">
            <div class="px-2 ml-auto d-flex flex-row">
              <div class="notif-icon"><v-icon @click.stop="timeDialog = true" class="white--text" style="font">schedule</v-icon></div>
              <div class="mr-1 mt-1"> {{jalali_update_date}}</div>
            </div>

            <div class="d-flex flex-row">
              <div v-if="notifInfo.buy_sell" class="px-2" style="align-self: center;">{{notifInfo.buy_sell}}</div>
              <div v-if="!notifInfo.close && !notifInfo.expire" class="px-2">فعال</div>
              <div v-if="notifInfo.close" class="px-2" style="align-self: center;">ببند</div>
              <div v-if="notifInfo.expire" class="px-2" style="align-self: center;">منقضی</div>
              <div v-if="notifInfo.desc" class="notif-icon"><v-icon @click.stop="descDialog = true" class="white--text" style="font">description</v-icon></div>
            </div>
        </div>
        <v-dialog
          v-model="timeDialog"
          max-width="290"
        >
          <v-card>
            <v-card-text>
              تاریخ پیام:
              <br>
              {{notifInfo.jalali_update}}
            </v-card-text>
            <v-card-text v-if="notifInfo.close || notifInfo.expire">
              تاریخ شروع پیام :
              <br>
              {{notifInfo.jalali_create}}
            </v-card-text>
          </v-card>
        </v-dialog>
        <v-dialog
          v-model="descDialog"
          max-width="290"
        >
          <v-card>
            <v-card-text>
              {{notifInfo.desc}}
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
                        <td>{{notifInfo.pair}}</td>
                        <td>{{notifInfo.startingPrice}}</td>
                        <td>{{notifInfo.forex_category_id}}</td>
                        <td>{{notifInfo.sl}}</td>
                        <td>{{notifInfo.tp}}</td>
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
        jalali_update_date:'',
        timeDialog: false,
        descDialog: false,
      }
    },
    methods:{
      convertJalali(){
        this.jalali_update_date = moment(this.notifInfo.updated_at).format('HH:mm:ss');
        this.notifInfo.jalali_update = moment(this.notifInfo.update_at).format('HH:mm:ss - YY/M/D');
        this.notifInfo.jalali_create = moment(this.notifInfo.created_at).format('HH:mm:ss - YY/M/D');
      },
      buySell :function(){
        if(this.notifInfo.buy_sell == 'buy'){
          this.notifInfo.buy_sell = 'خرید'
        }else if(this.notifInfo.buy_sell == 'sell'){
          this.notifInfo.buy_sell = 'فروش'
        }
      }
     
    },
    created () {
      this.convertJalali();
      this.buySell();
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
  .notif-icon i{
    font-size: 1rem;
  }
  .v-dialog > .v-card > .v-card__text{
    padding:0 18px 20px;
  }
 </style>
<template>
    <div>
        <div :class="{'bg-close':binaryInfo.close}" class="d-flex bg-open notif_header">
            <div class="px-2 ml-auto d-flex flex-row">
              <div class="notif-icon"><v-icon @click.stop="timeDialog = true" class="white--text" style="font">schedule</v-icon></div>
              <div class="mr-1 mt-1"> {{jalali_update_date}}</div>
            </div>

            <div class="d-flex flex-row">
              <div v-if="binaryInfo.buy_sell" class="px-2" style="align-self: center;">{{binaryInfo.buy_sell}}</div>
              <div v-if="!binaryInfo.close" class="px-2" style="align-self: center;">فعال</div>
              <div v-if="binaryInfo.close" class="px-2" style="align-self: center;">ببند</div>
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
              {{binaryInfo.jalali_update}}
            </v-card-text>
            <v-card-text v-if="binaryInfo.close || binaryInfo.expire">
              تاریخ شروع پیام :
              <br>
              {{binaryInfo.jalali_create}}
            </v-card-text>
          </v-card>
        </v-dialog>
        <div class="table-responsive white">
                <table class="table text-center">
                <thead>
                    <tr>
                        <th>ارز</th>
                        <th>زمان (دقیقه)</th>
                        <th>آماده (دقیقه)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{binaryInfo.pair}}</td>
                        <td>{{binaryInfo.time_expire}}</td>
                        <td>{{binaryInfo.ready}}</td>
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
        binaryInfo:Object
    },
    data () {
      return {
        jalali_update_date:'',
        timeDialog: false,
      }
    },
    methods:{
      convertJalali(){
        this.jalali_update_date = moment(this.binaryInfo.updated_at).format('HH:mm:ss');
        this.binaryInfo.jalali_update = moment(this.binaryInfo.updated_at).format('HH:mm:ss - YY/M/D');
        this.binaryInfo.jalali_create = moment(this.binaryInfo.created_at).format('HH:mm:ss - YY/M/D');
      },
      buySell :function(){
        if(this.binaryInfo.buy_sell == 'buy'){
          this.binaryInfo.buy_sell = 'خرید'
        }else if(this.binaryInfo.buy_sell == 'sell'){
          this.binaryInfo.buy_sell = 'فروش'
        }
      }
    },
    
    created () {
      this.convertJalali();
      this.buySell();
     
    },
    updated(){
      
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
 
  
 </style>
<template>
    <div>
        <div :class="{'bg-expire': notif.expire}" class="d-flex bg-open notif_header">
            <div class="px-2 ml-auto d-flex flex-column">
              <div>تاریخ پیام: {{notif.updated_at}}</div>
              <div v-if="notif.close || notif.expire">تاریخ شروع: {{notif.created_at}}</div>
            </div>
            <div v-show="notif.buy_sell" class="px-2" style="align-self: center;">{{notif.buy_sell}}</div>
            <div v-if="!notif.close" class="px-2">فعال</div>
            <div v-if="notif.close" class="px-2 bg-expire" style="align-self: center;">Expire</div>
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
        notif : this.binaryInfo
      }
    },
    methods:{
      convertJalali(){
        this.notif.updated_at = moment(this.notif.updated_at).format('HH:mm:ss - YY/M/D');
        this.notif.created_at = moment(this.notif.created_at).format('HH:mm:ss - YY/M/D');
      },
      buySell :function(){
        if(this.notif.buy_sell == 'buy'){
          this.notif.buy_sell = 'خرید'
        }else if(this.notif.buy_sell == 'sell'){
          this.notif.buy_sell = 'فروش'
        }
      }
    },
    
    created () {
      this.convertJalali();
      this.buySell;
     
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
    font-size: .6rem;
  }
  .notif_header{
    padding: 2px 2px;
    border-bottom: 1px solid #c7c7c7;
  }
  
 </style>
<template>
    <div>
        <div :class="{'bg-expire': notif.expire}" class="d-flex bg-open notif_header">
            <div class="px-2 ml-auto">{{notif.created_at}}</div>
            <div v-show="notif.buy_sell" class="px-2">{{notif.buy_sell}}</div>
            <div v-if="!notif.close" class="px-1">فعال</div>
            <div v-if="notif.close" class="px-2 bg-expire">Expire</div>
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
    },
    
    created () {
     
    },
    updated(){
      
    }
  }
</script>

<style scoped>
  table td{
    font-size: .75rem;
    width: 4rem;
  }
  table th{
    font-size: .6rem;
    width: 4rem;
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
    background: #ef9a9a!important;
  }
  .bg-open{
    background: #ffecb3;
  }
  .bg-expire{
    background: #bdbdbd !important;
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
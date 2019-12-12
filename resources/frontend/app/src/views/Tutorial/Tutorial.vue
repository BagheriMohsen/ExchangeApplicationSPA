<template>
    <section>
      <v-container fluid>
        <v-row>
          <v-col cols="6">
            <v-card router :to="'/tutorial/binary'"
            dark
            class="mx-auto pa-3"
            width="40vw"
            height="40vw"
            style="background:rgba(133, 177, 202, 0.5)"
      >
        <v-img
          class="align-end mx-auto"
          height="25vw"
          width="25vw"
          src="/img/graph.png"
        >
          </v-img>
          <v-card-text class="text-center pa-0">
              باینری آپشن
          </v-card-text>

         
      </v-card>
          </v-col>
          <v-col cols="6">
            <v-card router :to="'/tutorial/farx'"
            dark
        class="mx-auto pa-3"
        width="40vw"
        height="40vw"
        style="background:rgba(133, 177, 202, 0.5)"
      >
        <v-img
          class="white--text align-end mx-auto"
          height="25vw"
          width="25vw"
          src="/img/money-growth.png"
        >
          </v-img>
          <v-card-text class="text-center pa-0 ">
              فارکس 
          </v-card-text>
      </v-card>
          </v-col>
        </v-row>
      </v-container>
      <button @click="checkToken"></button>
    </section>
    
</template>
<script>
  export default {
    data () {
      return {
        user:'',
        items: [
          {
            color: '#fff',
            src: './img/graph.png',
            title: 'فارکس',
            url: '/tutorial/farx',
          },
          {
            color: '#fff',
            src: './img/graph.png',
            title: 'باینری آپشن',
            url: '/tutorial/binary',
          }
        ],
        token: localStorage.getItem('token')
        }
    },
    methods:{
      // checkToken(){
      //   if(this.token == ''){
      //     this.$router.push('/login');
      //   }else{
      //     this.$http.get('http://localhost:8000/token',{params:{token:this.token}})
      //       .then(response => {
      //         console.log(response);
      //         this.user = response.data;
      //         }).catch(err => {
      //           console.log(err);
      //           console.log(err.response);
      //           if(err.response.status == 400 || err.response.status == 401){
      //             this.$router.push('/login');
      //           }
      //         });
      //   }
      // },
      checkUserRole(){

      }
    },
    mounted(){
     this.checkToken();
    }
  }
</script>
<style scoped>
  .v-card__text{
    font-size: 5vw;
  }
</style>
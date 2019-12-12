<template>
    <footer>
       <v-bottom-navigation
        v-model="bottomNav"
        height="50px"
        dark
        grow
        fixed
        color="white"
        >
            <v-btn  
            value="tutorial"
            router :to='"/"'>
                <span>آموزش</span>
                <v-icon>account_balance</v-icon>
            </v-btn>
            <v-btn value="farx"
              router :to='"/farx"'>
                <span>فارکس</span>
                <v-icon>bar_chart</v-icon>
            </v-btn>
             <v-btn
            router :to='"/binary"'
            value="binary">
                <span>باینری</span>
                <v-icon small>multiline_chart</v-icon>
            </v-btn>
            <v-btn
            router :to='"/archive"'
            value="archive">
                <span>بایگانی</span>
                <v-icon small>move_to_inbox</v-icon>
            </v-btn>
           
        </v-bottom-navigation>
    </footer>
    
</template>
<script>
  export default {
    data () {
      return {
        bottomNav: 'tutorial',
      }
    },
  }
</script>
<style scoped>
 .v-item-group.v-bottom-navigation .v-btn{
   min-width: 40px;
 }
 .v-item-group.v-bottom-navigation .v-btn .v-btn__content .v-icon{
   font-size: 20px;
 }
</style>
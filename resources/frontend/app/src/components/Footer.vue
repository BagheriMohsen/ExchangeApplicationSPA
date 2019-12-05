<template>
    <footer>
       <v-bottom-navigation
        v-model="bottomNav"
        dark
        grow
        fixed
        color="white"
        >
            <v-btn value="farx" class="white--text"
              router :to='"/farx"'>
                <span>فارکس</span>
                <v-icon>attach_money</v-icon>
            </v-btn>

            <v-btn  
            value="tutorial"
            router :to='"/"'>
                <span>آموزش</span>
                <v-icon>account_balance</v-icon>
            </v-btn>

            <v-btn
            router :to='"/archive"'
            value="archive">
                <span>بایگانی</span>
                <v-icon small>tab</v-icon>
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
 
</style>
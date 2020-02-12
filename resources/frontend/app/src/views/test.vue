<template>
    <div>test</div>
</template>

<script>
import Pusher from 'pusher-js'
export default {
  name: 'App',
  data(){
    return{
      audio: new Audio('https://freesound.org/data/previews/66/66136_606715-lq.mp3'),
    }
  },
  methods:{
    farxSubscribe(){
      let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
      pusher.subscribe('ForexNotif')
      pusher.bind('App\\Events\\ForexNotifEvent', () => this.audio.play())
    },
    binarySubscribe(){
        let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
        pusher.subscribe('BinaryNotif')
        pusher.bind('App\\Events\\BinaryNotif', () => this.audio.play())
    },
  },
  created(){
    this.farxSubscribe();
    this.binarySubscribe();
  },
  updated(){
  },
  mounted(){
  }
};
</script>


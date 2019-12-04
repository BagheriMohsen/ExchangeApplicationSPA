<template>
    <section>
      <v-tabs 
        show-arrows 
        dark 
        v-model="tab"
        background-color="transparent"
        grow
      >
      <v-tabs-slider></v-tabs-slider>
        <v-tab class="pa-0 ma-0 caption"
          v-for="item in items"
          :key="item.tag"
        >
          {{ item.tag }}
        </v-tab>
      </v-tabs>

      <v-tabs-items class="mt-1"  v-model="tab" style="background:none">
        <v-tab-item
          v-for="item in items"
          :key="item.tag"
        >
        <v-container fluid class="pa-0">
          <v-row dense>
            <v-col
              v-for=" content in item.content"
              :key="content.id"
              cols="12"
            >
              <v-card class="mx-1 bg-unique" 
              >
                <div class="d-flex flex-no-wrap" >
                     <v-avatar
                    class="ma-2"
                    size="10%"
                    tile
                  >
                    <v-img :src="'/assets/img/' + content.imgUrl"></v-img>
                  </v-avatar>
                    <v-card-title style="color:white"
                      class="ma-0 pa-0 pl-1"
                      v-text="content.title"
                    ></v-card-title>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
        </v-tab-item>
      </v-tabs-items>
    </section>
    
</template>
<script>
  export default {
    data () {
      return {
        info:null,
        tab: null,
        items: [
          {
            tag:'وریفای',
            content: [
              {
                id:'1',
                title:' لورم ساز، تولید کننده لورم ایپسوم فارسی و انگلیسی برای   ',
                body:'1متن مقاله',
                tag:'1دسته مقاله',
                imgUrl:'graph.png',
                url:''
              },
              {
                id:'2',
                title:'2اسم مقاله',
                body:'2متن مقاله',
                tag:'2دسته مقاله',
                imgUrl:'graph.png',
                url:''
              },{
                id:'2',
                title:'2اسم مقاله',
                body:'2متن مقاله',
                tag:'2دسته مقاله',
                imgUrl:'graph.png',
                url:''
              },{
                id:'2',
                title:'2اسم مقاله',
                body:'2متن مقاله',
                tag:'2دسته مقاله',
                imgUrl:'graph.png',
                url:''
              },{
                id:'2',
                title:'2اسم مقاله',
                body:'2متن مقاله',
                tag:'2دسته مقاله',
                imgUrl:'graph.png',
                url:''
              }
            ]
          },
          {
            tag:'متاتریدر',
            content: []
          },
          {
            tag:'اصطلاحات',
            content: []
          },
          {
            tag:'معاملات',
            content: []
          }
        ],
        articles : [
          {
            id:'1',
            title:'اسم مقاله',
            body:'متن مقاله',
            tag:'دسته مقاله',
            imgUrl:'graph.png'
          }
        ]
      }
    },
    mounted () {
      this.$http
        .get('https://api.coindesk.com/v1/bpi/currentprice.json')
        .then(response => (this.info = response))
    }
  }
</script>
 <style scoped>
 .v-card__title{
    font-size: 5vw;
    line-height: inherit;
    letter-spacing: inherit;
    color:#fafafa;
 }
 .row--dense > .col, .row--dense > [class*=col-] {
    padding: 2px;
}
 </style>
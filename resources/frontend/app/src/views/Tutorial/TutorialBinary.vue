<template>
    <section>
        <v-card color="basil">
            <v-tabs
            v-model="tab"
            background-color="transparent"
            color="basil"
            grow
            >
            <v-tab
                v-for="item in items"
                :key="item"
            >
                {{ item }}
            </v-tab>
            </v-tabs>

            <v-tabs-items v-model="tab">
            <v-tab-item
                v-for="item in items"
                :key="item"
            >
                <v-card flat color="basil">
                    <v-card-text>{{ text }}</v-card-text>
                </v-card>
            </v-tab-item>
            </v-tabs-items>
        </v-card>
    </section>
    
</template>
<script>
  export default {
    data () {
      return {
        tab: null,
        items: [
          'وریفای', 'متاتریدر', 'اصطلاحات', 'معاملات',
        ],
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      }
    },
  }
</script>
   
<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
           
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div slot="header" class="bg-white row align-items-center">
                            <div class="col">
                            ارسال تیکت
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <form role="form">
                                    <base-input alternative=""
                                            label="موضوع تیکت:"
                                            placeholder="لطفا موضوع را وارد نمایید"
                                            input-classes="form-control-alternative"
                                    />
                                    <select class="form-control form-control-alternative mb-3" id="#">
                                        <label for="">ارسال به بخش :</label>
                                        <option>پشتیبانی</option>
                                        <option>مدیریت</option>
                                    </select>
                                    <base-input alternative=""
                                                label="متن تیکت">
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="لطفا متن تیکت را وارد نمایید"></textarea>
                                    </base-input>
                                    <base-button type="primary" class="my-4">ارسال</base-button>
                                </form>
                            </div>
                            
                        </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  
  export default {
    name: 'addTickets',
    components: {
     
    },
    data() {
      return {
        
      };
    },
    methods: {
      
    },
    mounted() {
     
    }
  };
</script>
<style></style>

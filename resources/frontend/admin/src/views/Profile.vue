<template>
    <div>
        <base-header class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center bg-gradient-exchange"
                     style="min-height: 200px; background-image: url(img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-success opacity-8 bg-gradient-exchange"></span>
            <!-- Header container -->
            <!-- <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">سلام احمد ملایی</h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                        <a href="#!" class="btn btn-info">ویرایش حساب کاربری</a>
                    </div>
                </div>
            </div> -->
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="img/theme/team-4-800x800.jpg" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <!-- <base-button size="sm" type="info" class="mr-4">Connect</base-button>
                                <base-button size="sm" type="default" class="float-right">Message</base-button> -->
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading">22</span>
                                            <span class="description">سفارشات</span>
                                        </div>
                                        <div>
                                            <span class="heading">10</span>
                                            <span class="description">تیکت</span>
                                        </div>
                                        <div>
                                            <span class="heading">89</span>
                                            <span class="description">کیف پول</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    احمد ملایی
                                </h3>
                                <div class="h5 font-weight-300">
                                    تاریخ ثبت نام:<span class="font-weight-light mr-2">26 تیر 95</span>
                                </div>
                                <!-- <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>University of Computer Science
                                </div>
                                <hr class="my-4" />
                                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                                <a href="#">Show more</a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 order-xl-1">
                    <card shadow type="secondary">
                        <div slot="header" class="bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">حساب کاربری</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <router-link to="/editprofile">
                                        <a href="#!" class="btn btn-primary">ویرایش</a>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <template>
                            <form @submit.prevent>
                                <h6 class="heading-small text-muted mb-4"> اطلاعات تماس</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5>آدرس ایمیل:</h5>
                                            <span class="mr-2 ">mortezamohiuodin@gmail.com</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5>شماره تماس:</h5>
                                            <span class="mr-2">09192323232</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mt-2">
                                            <h5>شماره ثابت:</h5>
                                            <span class="mr-2">025323323</span>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <h5>آدرس:</h5>
                                            <span class="mr-2">تهران، بزرگراه شهید چمران، خیابان یمن،ميدان شهيد شهرياری، بلوار دانشجو</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">اطلاعات شخصی</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5>نام و نام خانوادگی :</h5>
                                            <span class="mr-2">احمد ملایی</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5>کد ملی :</h5>
                                            <span class="mr-2">3243242432</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5>سال تولد: </h5>
                                            <span class="mr-2">1371</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Verify -->
                                <h6 class="heading-small text-muted mb-4">اطلاعات جهت احراز هویت</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <base-input class="input-group-alternative"
                                                        label="عکس کارت ملی"
                                                        type="file">
                                            </base-input>
                                        </div>
                                         <div class="col-lg-6">
                                            <base-input class="input-group-alternative"
                                                        label="عکس کارت بانکی"
                                                        type="file">
                                            </base-input>
                                        </div>
                                         <div class="col-lg-12">
                                            <base-input class="input-group-alternative"
                                                        label="عکس سلفی همراه با کارت ملی و تصویر یک برگه حاوی تاریخ و امضا"                                                        type="file">
                                            </base-input>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <hr class="my-4" /> -->
                                <!-- Description -->
                                <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <base-input alternative=""
                                                    label="About Me">
                                            <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                        </base-input>
                                    </div>
                                </div> -->
                            </form>
                        </template>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    name: 'user-profile',
    data() {
      return {
        model: {
          username: '',
          email: '',
          firstName: '',
          lastName: '',
          address: '',
          city: '',
          country: '',
          zipCode: '',
          about: '',
        }
      }
    },
  };
</script>
<style></style>

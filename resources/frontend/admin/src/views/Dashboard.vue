<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
           
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                 <!--Crypto Exchange-->
                <!-- <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div slot="header" class="bg-white row align-items-center">
                        <div class="col">
                          خرید و فروش ارز دیجیتال
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-12 col-sm-5">
                          <div class="mb-3">پرداختی شما</div>
                          <div class="row">
                            <div class="">
                                <base-dropdown>
                                  <li slot="title" class="nav-link nav-link-icon form-control-alternative p-2" href="#" role="button" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      <img src="img/logos/bitcoin-btc-logo.png">
                                      <span class="mr-3">بیت کوین</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/ethereum-eth-logo.png" alt="">
                                    <span class="mr-3">اتریوم</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/litecoin-ltc-logo.png" alt="">
                                    <span class="mr-3">لایت کوین</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/monero-xmr-logo.png" alt="">
                                    <span class="mr-3">مونرو</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/webmoney_logo.png" alt="">
                                    <span class="mr-3">وب مانی</span>
                                  </li>
                              </base-dropdown>
                             
                              
                            </div>
                            <div class="flex-fill">
                              <base-input alternative=""
                                        label=""
                                        placeholder=""
                                        input-classes="form-control-alternative p-4 text-center"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-1 text-center align-self-center">
                           <img src="img/icons/changer.png" width="30" height="30"> 
                        </div>  
                        <div class="col-12 col-sm-5">
                          <div class="mb-3">دریافتی شما</div>
                          <div class="row">
                            <div class="flex-fill">
                              <base-input alternative=""
                                        label=""
                                        placeholder=""
                                        input-classes="form-control-alternative p-4 text-center"
                              />
                            </div>
                            <div class="">
                                <base-dropdown>
                                  <li slot="title" class="nav-link nav-link-icon form-control-alternative p-2" href="#" role="button" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      <img src="img/logos/bitcoin-btc-logo.png">
                                      <span class="mr-3">بیت کوین</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/ethereum-eth-logo.png" alt="">
                                    <span class="mr-3">اتریوم</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/litecoin-ltc-logo.png" alt="">
                                    <span class="mr-3">لایت کوین</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/monero-xmr-logo.png" alt="">
                                    <span class="mr-3">مونرو</span>
                                  </li>
                                  <li class="dropdown-item" href="#">
                                    <img src="img/logos/webmoney_logo.png" alt="">
                                    <span class="mr-3">وب مانی</span>
                                  </li>
                              </base-dropdown>
                             
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="text-center">
                              <base-button type="primary" class="my-4 px-5">ثبت درخواست</base-button>
                          </div>
                        </div>
                      </div>
                    </card>
                </div> -->
                <!-- End Crypto Exchange-->

                <!--Crypto Charts-->
                <!-- <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div slot="header" class="bg-white row align-items-center">
                        <div class="col">
                          نمودار ارزهای دیجیتالی
                        </div>
                      </div>
                      <line-chart
                              :height="350"
                              ref="bigChart"
                              :chart-data="bigLineChart.chartData"
                              :extra-options="bigLineChart.extraOptions"
                      >
                      </line-chart>
                      <div class="row">
                        <div class="col-xl-3 col-lg-6">
                          <stats-card title="بیت کوین"
                                      sub-title="12,000"
                                      icon="fab fa-bitcoin fa-2x text-green"
                                      class="mb-4 mb-xl-0"
                          >
                              <template slot="footer">
                                  <span class="text-success ml-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                  <span class="text-nowrap">از یک ساعت قبل</span>
                              </template>
                          </stats-card>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                          <stats-card title="بیت کوین"
                                      sub-title="12,000"
                                      icon="fab fa-bitcoin fa-2x text-green"
                                      class="mb-4 mb-xl-0"
                          >
                              <template slot="footer">
                                  <span class="text-success ml-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                  <span class="text-nowrap">از یک ساعت قبل</span>
                              </template>
                          </stats-card>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                          <stats-card title="بیت کوین"
                                      sub-title="12,000"
                                      icon="fab fa-bitcoin fa-2x text-green"
                                      class="mb-4 mb-xl-0"
                          >
                              <template slot="footer">
                                  <span class="text-success ml-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                  <span class="text-nowrap">از یک ساعت قبل</span>
                              </template>
                          </stats-card>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                          <stats-card title="بیت کوین"
                                      sub-title="12,000"
                                      icon="fab fa-bitcoin fa-2x text-green"
                                      class="mb-4 mb-xl-0"
                          >
                              <template slot="footer">
                                  <span class="text-success ml-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                  <span class="text-nowrap">از یک ساعت قبل</span>
                              </template>
                          </stats-card>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                          <stats-card title="بیت کوین"
                                      sub-title="12,000"
                                      icon="fab fa-bitcoin fa-2x text-green"
                                      class="mb-4 mb-xl-0"
                          >
                              <template slot="footer">
                                  <span class="text-success ml-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                  <span class="text-nowrap">از یک ساعت قبل</span>
                              </template>
                          </stats-card>
                        </div>
                      </div>
                    </card>
                </div> -->
                <!-- End Crypto Charts-->
                <!-- <div class="col">
                    <projects-table title="نرخ خرید و فروش"></projects-table>
                </div> -->
            </div>
        </div>
    </div>
</template>


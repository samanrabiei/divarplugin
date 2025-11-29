<div>
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="{{ url()->previous() }}" class="back-btn">
                        <i class="icon feather icon-chevron-right"></i>
                    </a>
                    <h6 class="title"> استعلام خلافی خودرو</h6>
                </div>
                <div class="mid-content"></div>
                <div class="right-content">
                    <ul class="nav nav-pills light style-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-list-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-list" type="button" role="tab" aria-controls="pills-list"
                                aria-selected="true">
                                <i class="icon feather icon-phone"><a
                                        href="https://open-platform-redirect.divar.ir/completion">
                                        بازگشت به دیوار
                                    </a>
                                </i>
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </header>

    <form wire:submit.prevent="submit">
        <div class="page-content space-top p-b80">
            <div class="container">
                <h6 class="title border-bottom pb-2 mb-3"> استعلام خلافی خودرو</h6>

                <div class="mb-3">
                    <label class="form-label" for="phone">شماره موبایل مالک خودرو *</label>
                    <input type="number" wire:model="phone" id="phone" class="form-control">
                    @error('phone')
                        <strong class="text-primary">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="codemele">کد ملی مالک خودرو*</label>
                    <input type="number" wire:model="codemele" id="codemele" class="form-control">
                    @error('codemele')
                        <strong class="text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="codemele"> پلاک خودرو*</label>

                    <div class="plate-section border-section">

                        <!-- پرچم و I.R IRAN -->
                        <div class="palak-parcham">
                            <img src="{{ asset('assets/images/palak/flagiran.jpg') }}" alt="پرچم ایران"
                                style="height: 25px;">
                            <div style="font-weight: bold; margin-top: 5px;">I.R IRAN</div>
                        </div>

                        <!-- دو رقم اول -->
                        <div class="d-flex flex-column">
                            <input type="text" name="palak_part_1" wire:model="palak_part_1"
                                class="form-control plate-input" maxlength="2" placeholder="- -" id="palak_part_1">

                            @error('palak_part_1')
                                <span class="text-danger messagepalalk">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- حرف وسط -->
                        <div class="d-flex flex-column">
                            <input type="text" class="form-control plate-letter" maxlength="1" placeholder="الف"
                                name="palak_letter" wire:model="palak_letter" id="palak_letter">

                            @error('palak_letter')
                                <span class="text-danger messagepalalk">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- سه رقم وسط -->
                        <div class="d-flex flex-column">
                            <input type="text" class="form-control plate-input" maxlength="3" placeholder="- - -"
                                name="palak_part2" wire:model="palak_part2" id="palak_part2">

                            @error('palak_part2')
                                <span class="text-danger messagepalalk">{{ $message }}</span>
                            @enderror
                        </div>

                        <span>-</span>

                        <!-- ایران + دو رقم آخر -->
                        <div class="palak_irancode d-flex flex-column">
                            <div style="font-size: 12px; font-weight: bold;direction: rtl;">ایران</div>

                            <input type="text" class="form-control plate-input" maxlength="2" placeholder="- -"
                                name="palak_irancode" wire:model="palak_irancode" id="palak_irancode">

                            @error('palak_irancode')
                                <span class="text-danger messagepalalk">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>




                <div class="divider border"></div>
                <h6>توضیحات</h6>
                <h7> استعلام خلافی خودرو</h7>
                <p>
                    با استفاده از سرویس پرداخت خلافی خودرو، صاحبان خودروهای آگهی‌شده می‌توانند به‌صورت فوری و بدون نیاز
                    به مراجعه حضوری، تمامی جرایم رانندگی خود را استعلام کنند.
                </p>
            </div>
        </div>

        <div class="footer fixed bg-white border-top">
            <div class="container py-2">
                <div class="total-cart d-flex justify-content-between align-items-center">
                    <div class="price-area">
                        <h3 class="price">{{ number_format($price) }} تومان</h3>
                        <span class="font-w500 text-primary">هزینه سرویس</span>
                    </div>
                    <button class="btn btn-primary" type="submit">استعلام</button>
                </div>
            </div>
        </div>
    </form>
</div>

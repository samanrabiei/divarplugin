<div>
    <header class="header header-fixed">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <a href="javascript:void(0);" class="back-btn"><i class="icon feather icon-chevron-right"></i></a>
                </div>
                دیوار
                <div class="mid-content">
                    <h6 class="title">{{ __('app.name_app') }}</h6>
                </div>
                @auth
                    <div class="right-content">
                        <a href="{{ route('profile.profile') }}" class="">
                            <i class="icon feather icon-user"></i>
                            پروفایل
                        </a>
                    </div>
                @endauth
                @guest
                    <div class="right-content">
                        <a href="{{ route('profile.profile') }}" class="">
                            <i class="icon feather icon-user"></i>
                            ورود/ثبت نام
                        </a>
                    </div>
                @endguest
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
                <div class="mb-3" x-data="plateAutoMove()">
                    <label class="form-label" for="codemele"> پلاک خودرو*</label>

                    <div class="plate-section border-section">

                        <!-- پرچم -->
                        <div class="palak-parcham">
                            <img src="{{ asset('assets/images/palak/flagiran.jpg') }}" alt="پرچم ایران"
                                style="height: 25px;">
                            <div style="font-weight: bold; margin-top: 5px;">I.R IRAN</div>
                        </div>

                        <!-- دو رقم اول -->
                        <div class="d-flex flex-column">
                            <input type="number" name="palak_part_1" wire:model.lazy="palak_part_1"
                                class="form-control plate-input" maxlength="2" placeholder="- -" id="palak_part_1"
                                x-ref="i0" @input="next(0)" @keydown.backspace="back(0)">


                        </div>

                        <!-- حرف وسط -->
                        <div class="d-flex flex-column">
                            <select class="form-control plate-letter" name="palak_letter" wire:model.lazy="palak_letter"
                                id="palak_letter" x-ref="i1" @change="next(1)" @keydown.backspace="back(1)">
                                <option value="">حرف</option>
                                <option value="الف">الف</option>
                                <option value="ب">ب</option>
                                <option value="پ">پ</option>
                                <option value="ت">ت</option>
                                <option value="ث">ث</option>
                                <option value="ج">ج</option>
                                <option value="د">د</option>
                                <option value="ز">ز</option>
                                <option value="س">س</option>
                                <option value="ش">ش</option>
                                <option value="ص">ص</option>
                                <option value="ط">ط</option>
                                <option value="ع">ع</option>
                                <option value="ف">ف</option>
                                <option value="ق">ق</option>
                                <option value="ک">ک</option>
                                <option value="گ">گ</option>
                                <option value="ل">ل</option>
                                <option value="م">م</option>
                                <option value="ن">ن</option>
                                <option value="و">و</option>
                                <option value="ه">ه</option>
                                <option value="ی">ی</option>
                                <option value="معلولین">معلولین</option>
                                <option value="تشریفات">تشریفات</option>
                                <option value="D">D</option>
                                <option value="S">S</option>
                            </select>


                        </div>

                        <!-- سه رقم وسط -->
                        <div class="d-flex flex-column">
                            <input type="number" class="form-control plate-input" maxlength="3" placeholder="- - -"
                                name="palak_part2" wire:model.lazy="palak_part2" id="palak_part2" x-ref="i2"
                                @input="next(2)" @keydown.backspace="back(2)">


                        </div>

                        <span>-</span>

                        <!-- ایران + دو رقم آخر -->
                        <div class="palak_irancode d-flex flex-column">
                            <div style="font-size: 12px; font-weight: bold;direction: rtl;">ایران</div>

                            <input type="number" class="form-control plate-input" maxlength="2" placeholder="- -"
                                name="palak_irancode" wire:model.lazy="palak_irancode" id="palak_irancode"
                                x-ref="i3" @keydown.backspace="back(3)">

                        </div>

                    </div>
                    @error('palak_part_1')
                        <span class="text-danger messagepalalk">{{ $message }}</span></br>
                    @enderror

                    @error('palak_letter')
                        <span class="text-danger messagepalalk">{{ $message }}</span></br>
                    @enderror

                    @error('palak_part2')
                        <span class="text-danger messagepalalk">{{ $message }}</span></br>
                    @enderror

                    @error('palak_irancode')
                        <span class="text-danger messagepalalk">{{ $message }}</span></br>
                    @enderror

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
    <!-- مدال شیک -->
    <div class="modal fade" id="lettersModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">انتخاب حرف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                </div>

                <div class="modal-body text-center">

                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <button class="btn btn-primary letter-btn">الف</button>
                        <button class="btn btn-primary letter-btn">ب</button>
                        <button class="btn btn-primary letter-btn">پ</button>
                        <button class="btn btn-primary letter-btn">ت</button>
                        <button class="btn btn-primary letter-btn">ث</button>
                        <button class="btn btn-primary letter-btn">ج</button>

                        <button class="btn btn-primary letter-btn">د</button>
                        <button class="btn btn-primary letter-btn">ز</button>
                        <button class="btn btn-primary letter-btn">س</button>
                        <button class="btn btn-primary letter-btn">ش</button>
                        <button class="btn btn-primary letter-btn">ص</button>
                        <button class="btn btn-primary letter-btn">ط</button>
                        <button class="btn btn-primary letter-btn">ع</button>
                        <button class="btn btn-primary letter-btn">ف</button>
                        <button class="btn btn-primary letter-btn">ق</button>
                        <button class="btn btn-primary letter-btn">ک</button>
                        <button class="btn btn-primary letter-btn">گ</button>
                        <button class="btn btn-primary letter-btn">ل</button>
                        <button class="btn btn-primary letter-btn">م</button>
                        <button class="btn btn-primary letter-btn">ن</button>
                        <button class="btn btn-primary letter-btn">و</button>
                        <button class="btn btn-primary letter-btn">ه</button>
                        <button class="btn btn-primary letter-btn">ی</button>
                        <button class="btn btn-primary letter-btn">معلولین</button>
                        <button class="btn btn-primary letter-btn">تشریفات</button>
                        <button class="btn btn-primary letter-btn">D</button>
                        <button class="btn btn-primary letter-btn">S</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<script>
    function plateAutoMove() {
        return {
            next(index) {
                const el = this.$refs['i' + index];
                if (el.value.length > el.maxLength) {
                    el.value = el.value.slice(0, el.maxLength);
                }
                if (el.value.length === el.maxLength) {
                    this.$refs['i' + (index + 1)]?.focus();
                }
            },
            back(index) {
                const el = this.$refs['i' + index];
                if (el.value === '' && index > 0) {
                    this.$refs['i' + (index - 1)].focus();
                }
            }
        }
    }
</script>

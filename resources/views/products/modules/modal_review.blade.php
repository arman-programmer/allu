<!-- Start Modal Review -->
<div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Оставить отзыв</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        @if (Auth::check())
                            <div class="col-12 col-md-6">
                                <div class="modal-review-img">
                                    @if($product -> images->isNotEmpty())
                                        @foreach($product -> images as $image)
                                            @if($product->thumb == $image->count)
                                                <img class="img-fluid  border-around" src="{{ $image->link }}"
                                                     alt="{{ $product->name }}">
                                            @endif
                                        @endforeach
                                    @else
                                        <img class="img-fluid  border-around"
                                             src="{{ asset('assets/placeholder.svg') }}"
                                             alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <span class="modal__product-title m-t-25">{{ $product->name }}</span>
                                <form action="{{ route('product.review.add', $product->id) }}" method="post"
                                      class="form-box">
                                    @csrf
                                    <div class="review-box m-t-25">
                                        <p>Оценка:
                                            <span class="star-rating">
                                            <label for="rate-1" style="--i:1"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars" id="rate-1" value="1">
                                            <label for="rate-2" style="--i:2"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars" id="rate-2" value="2">
                                            <label for="rate-3" style="--i:3"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars" id="rate-3" value="3">
                                            <label for="rate-4" style="--i:4"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars" id="rate-4" value="4">
                                            <label for="rate-5" style="--i:5"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars" id="rate-5" value="5">
                                        </span>
                                        </p>
                                        @error('stars')
                                        <div class="text-danger m-t-10">{{ $message }}</div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                showToast("{{ $message }}", "danger", 5000);
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                    @if (Auth::user()->name === null)
                                        <div class="form-box__single-group">
                                            <label for="form-name">Ваше имя*</label>
                                            <input type="text" id="form-name" name="name">
                                        </div>
                                    @endif
                                    <div class="form-box__single-group">
                                        <label for="form-review">Ваш комментарий</label>
                                        <textarea id="form-review" name="text" rows="5"></textarea>
                                        @error('text')
                                        <div class="text-danger m-t-10">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div
                                        class="from-box__buttons d-flex justify-content-between d-flex-warp align-items-center">
                                        <button
                                            class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-20 m-r-10"
                                            type="submit">Отправить
                                        </button>
                                        <button
                                            class="btn btn--box btn--small btn--gray btn--uppercase btn--weight m-t-20"
                                            type="button" data-dismiss="modal" aria-label="Close">Отмена
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="col-12">
                                <p class="text-center">Для оставления отзыва необходимо <a
                                        href="{{ route('login') }}">авторизоваться</a></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Modal Review  -->

function Slider() {
    this.imagesUrls = [];
    this.currentImageIndex = 0;
    this.btnPrev = null;
    this.btnNext = null;
    this.slideImg = null;
    this.start = function (elid) {
        var that = this;

        var elSelector = "#" + elid;
        var el = document.querySelector(elSelector);

        this.btnPrev = el.querySelector(".btn-prev");
        this.btnNext = el.querySelector(".btn-next");
        this.slideImg = el.querySelector(".slide-img");

        this.btnPrev.addEventListener("click", function (e) {
            that.onbtnPrevClick(e);
        });

        this.btnNext.addEventListener("click", function (e) {
            that.onbtnNextClick(e);
        });

        //create img array
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192100.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192131.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192151.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192418.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192440.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192452.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192510.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192524.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192541.png");
        this.imagesUrls.push("img(slider)/Снимок экрана 2023-11-13 192559.png");

        this.slideImg.src = this.imagesUrls[this.currentImageIndex];
        this.btnPrev.disabled = true;
    };

    this.onbtnPrevClick = function (e) {
        this.currentImageIndex--;
        this.slideImg.src = this.imagesUrls[this.currentImageIndex];
        this.btnNext.disabled = false;

        //disable if end
        if (this.currentImageIndex === (0)) {
            this.btnPrev.disabled = true;
        }
    };

    this.onbtnNextClick = function (e) {
        this.currentImageIndex++;
        this.slideImg.src = this.imagesUrls[this.currentImageIndex];
        this.btnPrev.disabled = false;

        //disable if end
        if (this.currentImageIndex === (this.imagesUrls.length - 1)) {
            this.btnNext.disabled = true;
        }
    };
    this.setImages = function (imageArray) {
        this.imagesUrls = imageArray;
    };

}
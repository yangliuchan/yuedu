    <footer class="container">
        <div class="row"><em>&copy; 2015</em></div>

    </footer>

    </body>
    <script src="skin/iconfont/iconfont.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="skin/js/polyfill.min.js"></script>
    <script>
        let hero = document.getElementById('hero-slides');
        let menu = document.getElementById('menu');
        let slides = document.getElementById('slides');
        let next = [ 'next', 'next-catch' ].map(n => document.getElementById(n));
        let prev = [ 'prev', 'prev-catch' ].map(n => document.getElementById(n));
        let slideChildren = slides.children;
        let slideCount = slides.children.length;
        let currentlyDemoing = false;
        let currentPage = 0;
        let slidesPerPage = () => window.innerWidth > 1700 ? 4 : window.innerWidth > 1200 ? 3 : 2;
//        let slidesPerPage = function(){
//            return window.innerWidth > 1700 ? 4 : window.innerWidth > 1200 ? 3 : 2;
//        };
        let maxPageCount = () => slideCount / slidesPerPage() - 1;
//        let maxPageCount = function(){
//            return slideCount / slidesPerPage() - 1;
//        };

        function goToPage(pageNumber = 0) {
            currentPage = Math.min(maxPageCount(), Math.max(0, pageNumber));
            console.log(currentPage);
            hero.style.setProperty('--page', currentPage);
        }

        function sleep(time) {
            return new Promise(res => setTimeout(res, time));
        }

        function hoverSlide(index) {
            index in slideChildren &&
            slideChildren[index].classList.add('hover');
        }

        function unhoverSlide(index) {
            index in slideChildren &&
            slideChildren[index].classList.remove('hover');
        }

        async function demo() {
            if(!currentlyDemoing) {
                return;
            }
            currentlyDemoing = true;
            if(currentPage !== 0) {
                goToPage(0);
                await sleep(800);
            }
            let slides = slidesPerPage();
            let pageSeq_ = { 2: [ 1, 2, 1 ], 3: [ 1, 2, 1 / 3 ], 4: [ 1, 1, 0 ] };
            let pageSeq = pageSeq_[slides] || pageSeq_[4];
            let slideSeq_ = { 2: [ 2, 4, 3 ], 3: [ 3, 6, 2 ], 4: [ 3, 6, 2 ] };
            let slideSeq = slideSeq_[slides] || slideSeq_[2];
            await sleep(300);
            goToPage(pageSeq[0]);
            await sleep(500);
            hoverSlide(slideSeq[0]);
            await sleep(1200);
            goToPage(pageSeq[1]);
            unhoverSlide(slideSeq[0]);
            await sleep(500);
            hoverSlide(slideSeq[1]);
            await sleep(1200);
            goToPage(pageSeq[2]);
            unhoverSlide(slideSeq[1]);
            await sleep(300);
            hoverSlide(slideSeq[2]);
            await sleep(1600);
            goToPage(0);
            unhoverSlide(slideSeq[2]);
            currentlyDemoing = false;
        }

        next.forEach(n => n.addEventListener('click', () => !currentlyDemoing && goToPage(currentPage + 1)));
        prev.forEach(n => n.addEventListener('click', () => !currentlyDemoing && goToPage(currentPage - 1)));
//        menu.addEventListener('click', demo);

        sleep(100).then(demo);

        // window.addEventListener('resize', () => {
        // console.log(document.body.style.getPropertyValue('--slide-per-page'));
        // });
    </script>

    </html>

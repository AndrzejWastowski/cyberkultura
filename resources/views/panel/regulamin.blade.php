@extends('layouts.app')
@section('content')
    <div class="container pt-5"></div>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Regulamin</h2>
                    <p>Stowarzyszenia Ogrodowego „Słoneczko”</p>
                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="/">Słoneczko</a></li>
                <li>Regulamin stowarzyszenia</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
        <div class="entry">
            <div class="section-title" data-aos="fade-up">
                <div class="pdf-container">
                    <div id="pdf-viewer" style="margin:auto;"></div>
                    <div id="pagination" style="margin:auto;"></div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
                </div>
            </div>
        </div>
    <script>
        var url = '{{ asset('storage/resources/regulamin.pdf'); }}';
        var pdfDoc = null;
        var pageNum = 1;
        var pageRendering = false;
        var pageNumPending = null;
        var scale = 1.5;
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var container = document.getElementById('pdf-viewer');
        var paginationContainer = document.getElementById('pagination');

        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then(function(page) {
                var viewport = page.getViewport({scale: scale});
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                page.render(renderContext).promise.then(function() {
                    container.innerHTML = '';
                    container.appendChild(canvas);
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
            document.getElementById('page-num').textContent = pageNum;
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }

        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }

        pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            var numPages = pdfDoc.numPages;
            document.getElementById('page-count').textContent = numPages;
            document.getElementById('prev-page').addEventListener('click', onPrevPage);
            document.getElementById('next-page').addEventListener('click', onNextPage);
            renderPage(pageNum);
        });

    </script>

    <div>
        <button id="prev-page">Poprzednia</button>
        <span>Strona: <span id="page-num"></span> / <span id="page-count"></span></span>
        <button id="next-page">Następny</button>
    </div>
@endsection
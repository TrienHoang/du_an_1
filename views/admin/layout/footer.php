<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->

<!-- latest js -->
<script src="../public/admin/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js -->
<script src="../public/admin/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- feather icon js -->
<script src="../public/admin/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../public/admin/assets/js/icons/feather-icon/feather-icon.js"></script>


<!-- scrollbar simplebar js -->
<script src="../public/admin/assets/js/scrollbar/simplebar.js"></script>
<script src="../public/admin/assets/js/scrollbar/custom.js"></script>

<!-- Sidebar jquery -->
<script src="../public/admin/assets/js/config.js"></script>

<!-- tooltip init js -->
<script src="../public/admin/assets/js/tooltip-init.js"></script>



<!-- Plugins JS -->
<script src="../public/admin/assets/js/sidebar-menu.js"></script>
<!-- <script src="../public/admin/assets/js/notify/bootstrap-notify.min.js"></script> -->
<script src="../public/admin/assets/js/notify/index.js"></script>

<!-- Apexchar js -->
<script src="../public/admin/assets/js/chart/apex-chart/apex-chart1.js"></script>
<script src="../public/admin/assets/js/chart/apex-chart/moment.min.js"></script>
<script src="../public/admin/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="../public/admin/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="../public/admin/assets/js/chart/apex-chart/chart-custom1.js"></script>


<!-- slick slider js -->
<script src="../public/admin/assets/js/slick.min.js"></script>
<script src="../public/admin/assets/js/custom-slick.js"></script>

<!-- customizer js -->
<script src="../public/admin/assets/js/customizer.js"></script>

<!-- ratio js -->
<script src="../public/admin/assets/js/ratio.js"></script>

<!-- sidebar effect -->
<script src="../public/admin/assets/js/sidebareffect.js"></script>

<!-- Theme js -->
<script src="../public/admin/assets/js/script.js"></script>

<script>
    function ChangeToSlug() {
        var title, slug;

        //Lấy text từ thẻ input title 
        title = document.getElementById("product_name").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '-');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:35:33 GMT -->

</html>
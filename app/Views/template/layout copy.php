<html>
<?= $this->include('template/call_head') ?>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
<?= $this->include('template/page_sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 1592px;">

<?= $this->include('template/page_header') ?>
<!-- Main content -->
<?= $this->renderSection('judul') ?></h1>
	<hr>

	<?= $this->renderSection('konten') ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->include('template/call_footer') ?>
</div>
<?= $this->include('template/call_js') ?>
</body>
</html>
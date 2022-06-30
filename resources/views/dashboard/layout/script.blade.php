<!-- Core JS -->
<!-- build:js /assets/vendor/js/core.js -->
<script src={{ asset('assets/vendor/libs/jquery/jquery.js') }}></script>
<script src={{ asset('assets/vendor/libs/popper/popper.js') }}></script>
<script src={{ asset('assets/vendor/js/bootstrap.js') }}></script>
<script src={{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}></script>

<script src={{ asset('assets/vendor/libs/hammer/hammer.js') }}></script>
<script src={{ asset('assets/vendor/libs/i18n/i18n.js') }}></script>
<script src={{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}></script>

<script src={{ asset('assets/vendor/js/menu.js') }}></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src={{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}></script>
<script src={{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}></script>
<script src={{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}></script>
<script src={{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}></script>
<script src={{ asset('assets/vendor/libs/select2/select2.js') }}></script>
<script src={{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}></script>
<script src={{ asset('assets/vendor/libs/moment/moment.js') }}></script>
<script src={{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}></script>
<script src={{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}></script>
<script src={{ asset('assets/vendor/libs/tagify/tagify.js') }}></script>
<script src={{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}></script>
<script src={{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}></script>
<script src={{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}></script>
<!-- Fixed columns -->
<script src={{ asset('assets/vendor/libs/datatables-fixedcolumns/datatables.fixedcolumns.js') }}></script>
<!-- Fixed header -->
<script src={{ asset('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.js') }}></script>
<!-- Select -->
<script src={{ asset('assets/vendor/libs/datatables-select/datatables-select.js') }}></script>
<script src={{ asset('assets/vendor/libs/datatables-select-bs5/select.bootstrap5.js') }}></script>
<script src={{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}></script>

<script src={{ asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}></script>
<script src={{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}></script>


<!-- Main JS -->
<script src={{ asset('assets/js/main.js') }}></script>

<!-- Page JS -->
<script src={{ asset('assets/js/tables-datatables-extensions.js') }}></script>
<script src={{ asset('assets/js/form-validation.js') }}></script>
<script src={{ asset('assets/js/forms-selects.js') }}></script>
<script src={{ asset('assets/js/forms-tagify.js') }}></script>
<script src={{ asset('assets/js/forms-typeahead.js') }}></script>

<script src={{ asset('assets/js/app-access-permission.js') }}></script>
<script src={{ asset('assets/js/modal-add-permission.js') }}></script>
<script src={{ asset('assets/js/modal-edit-permission.js') }}></script>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/app-access-roles.js') }}"></script>
<script src="{{ asset('assets/js/modal-add-role.js') }}"></script>

@stack('scripts_after')

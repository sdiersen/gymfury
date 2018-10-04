'use strict';

import $ from 'jquery';
import 'bootstrap';
import '@fortawesome/fontawesome-free';

import '../../node_modules/bootstrap/scss/bootstrap.scss';
import '../../node_modules/@fortawesome/fontawesome-free/css/all.css';
import '../css/app.scss';

$('#categoryType').click(function() {
    let category = $("input[name='categoryType']:checked").val();
    $('#exercisesTitle').html('Exercises - ' + category);
});

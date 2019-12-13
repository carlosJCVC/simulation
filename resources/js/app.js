/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//window.Vue = require('vue');

module.exports = delete_action = (e) => {
    e.preventDefault();

    Swal.fire({
        title: 'Estas seguro!',
        text: 'Estas eguro de eliminar este registro ?',
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: 'hsl(120, 50%, 50%, 1)',
        cancelButtonColor: 'hsl(0, 50%, 50%, 1)',
        confirmButtonText: 'Yes !! '
    }).then(({value}) => {
        if (value) {
            e.target.form.submit()
        }
    })
};

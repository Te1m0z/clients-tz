const q = function ( selector ) {
    return document.querySelector( selector )
};
const qAll = function ( selector ) {
    return document.querySelectorAll( selector )
};

document.addEventListener( "DOMContentLoaded", function () {

    qAll( '.title' ).forEach( function ( el ) {
        el.addEventListener( 'click', function ( event ) {
            const record = event.currentTarget.closest( '.record' );
            console.log( record.querySelector( '.description' ).textContent.trim() );
            q( '.left-bar' ).textContent = record.querySelector( '.description' ).textContent.trim() || 'Пусто';
        } );
    } );

    window.openAddModal = function ( event ) {
        const overlay = q( '.add-overlay' );
        const record = event.currentTarget.closest( '.record' );
        if (record) {
            overlay.querySelector( '[name="parent_id"]' ).value = record.getAttribute( 'data-id' );
        }
        overlay.style.display = 'flex';
    }

    window.openEditModal = function ( event ) {
        const overlay = q( '.edit-overlay' );
        const record = event.currentTarget.closest( '.record' );
        overlay.querySelector( '[name="id"]' ).value = record.getAttribute( 'data-id' );
        overlay.querySelector( '[name="title"]' ).value = record.querySelector( '.title' ).textContent.trim();
        overlay.querySelector( '[name="description"]' ).value = record.querySelector( '.description' ).textContent.trim();
        overlay.style.display = 'flex';
    }

    window.closeModal = function ( _class ) {
        q( `.${_class}` ).style.display = 'none';
    }

    window.deleteRecord = async function ( event ) {
        const record = event.currentTarget.closest( '.record' );
        const id = record.getAttribute( 'data-id' );
        const formData = new FormData();
        formData.set( 'id', id );
        const response = await fetch( '/delete', {
            method: 'POST',
            body: formData
        } );

        const data = await response.json();

        if (!data.errors) {
            window.location.reload();
        }
    }

    qAll( '.more' ).forEach( function ( el ) {
        el.addEventListener( 'click', function () {
            const target = event.currentTarget;
            const parent = target.closest( '.record' );

            if (parent.classList.contains( 'active' )) {
                parent.classList.remove( 'active' );
                target.textContent = '+';
            } else {
                parent.classList.add( 'active' );
                target.textContent = '-';
            }
        } );
    } );

    /*
        Отключение дефолт поведения у всех форм
     */
    qAll( 'form' ).forEach( function ( el ) {
        el.addEventListener( 'submit', function ( event ) {
            event.preventDefault();
            event.stopPropagation();
        } )
    } );

    if (q( '#login-form' )) {
        q( '#login-form' ).addEventListener( 'submit', async function ( event ) {

            const form = event.currentTarget;
            const login = form.querySelector( '[name="login"]' );
            const password = form.querySelector( '[name="password"]' );
            const message = q( '.msg' );

            login.classList.remove( 'error' );
            password.classList.remove( 'error' );
            message.textContent = '';

            const formData = new FormData();
            formData.set( 'login', login.value );
            formData.set( 'password', password.value );

            const response = await fetch( '/login', {
                method: 'POST',
                body: formData,
            } );

            const data = await response.json();

            if (data.errors) {
                for (let err in data.errors) {
                    form.querySelector( `[name="${err}"]` ).classList.add( 'error' );
                }
            }

            if (data.message) {
                message.textContent = data.message;
            }

            if (!data.errors && !data.message) {
                window.location.href = '/admin';
            }
        } );
    }

    if (q( '#logout-form' )) {
        q( '#logout-form' ).addEventListener( 'submit', async function ( event ) {

            const response = await fetch( '/logout', {
                method: 'POST',
            } );

            const data = await response.json();

            console.log( data );

            if (!data.errors) {
                window.location.href = '/admin';
            }
        } );
    }

    if (q( '#edit-form' )) {
        q( '#edit-form' ).addEventListener( 'submit', async function ( event ) {

            const form = event.currentTarget;
            const id = form.querySelector( '[name="id"]' );
            const title = form.querySelector( '[name="title"]' );
            const description = form.querySelector( '[name="description"]' );
            const message = form.querySelector( '.msg' );

            title.classList.remove( 'error' );
            description.classList.remove( 'error' );
            message.textContent = '';

            const formData = new FormData();
            formData.set( 'id', id.value );
            formData.set( 'title', title.value );
            formData.set( 'description', description.value );

            const response = await fetch( '/edit', {
                method: 'POST',
                body: formData,
            } );

            const data = await response.json();

            if (data.errors) {
                for (let err in data.errors) {
                    form.querySelector( `[name="${err}"]` ).classList.add( 'error' );
                }
            }

            if (data.message) {
                message.textContent = data.message;
                setTimeout( () => window.location.reload(), 1000 );
            }

        } );
    }


    if (q( '#add-form' )) {
        q( '#add-form' ).addEventListener( 'submit', async function ( event ) {

            const form = event.currentTarget;
            const parent_id = form.querySelector( '[name="parent_id"]' );
            const title = form.querySelector( '[name="title"]' );
            const description = form.querySelector( '[name="description"]' );
            const message = form.querySelector( '.msg' );

            message.textContent = '';

            const formData = new FormData();
            formData.set( 'parent_id', parent_id.value );
            formData.set( 'title', title.value );
            formData.set( 'description', description.value );

            const response = await fetch( '/add', {
                method: 'POST',
                body: formData,
            } );

            const data = await response.json();

            if (data.errors) {
                for (let err in data.errors) {
                    form.querySelector( `[name="${err}"]` ).classList.add( 'error' );
                }
            }

            if (data.message) {
                message.textContent = data.message;
                setTimeout( () => window.location.reload(), 1000 );
            }

        } );
    }

} );
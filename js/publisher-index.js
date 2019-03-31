// display products

// display orders by clients

const publisherId = $('a#company-name-id').attr('data-id');

const getProductsByPublisherId = () => {
    $.get("service/publisher_index.php?publishers=byId&publisherId=" + publisherId + "", function (data) {
        // let publishers = JSON.parse(data);
        // publishers.map(function (k) {
        //     $('#publishersSelect').append($('<option>', {
        //         value: k.publiser_id,
        //         text: k.publisher_id.concat(' ').concat(k.company_name)
        //     }))
        // });
        console.log(data);
    });
};
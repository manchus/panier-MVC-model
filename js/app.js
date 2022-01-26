function getProduitById(idProduit) {
    console.log(idProduit);
              var parametros = {"product_id":idProduit}
              $.ajax({
                  data:parametros,
                  url:'./mvc_pr/admin',
                  type: 'post',
                  beforeSend: function () {
              
                  },
                  success: function (response) {   
                    console.log(response);
                    data = $.parseJSON(response)
                    if(data.length>0)
                    {
                      $('nomprod').val(data['titre_fr']),
                      $('prixprod').val(data['prix'])
                      $('stock').val(data['stock'])
                    }

                  }
              });
            };
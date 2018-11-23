(function($) {
	'use strict';


	$(function() {

		// enable price recal when country changed

		function updateVATCells(item) {

			var value = null;
			if (item && typeof item !== 'undefined') {
				value = item.val();
			} else {
				console.err("no input item");
			}

			var level = $('#rcp_subscription_levels input:checked');
			var levelVal = level.val();
			var rcp_company_vat_number = $('#rcp_company_vat_number').val();
			var data = {
				action : 'rcp_vat_get_vat_rate',
				'country_code' : value,
				'level' : levelVal,
				'rcp_company_vat_number' : rcp_company_vat_number
			};

			
			$.post(rcp_vat_ajax_object.ajax_url, data, function(response) {

				var vat_label = response.vat_label;
				var country = response.country_name;
				var country_rate = response.country_vat_rate;
				var vat_amount = response.vat_amount;
				var total_price = response.total_price;
				var level_price = response.raw_level_price;
				var with_tax_label = response.with_tax_label;
				var without_tax_label=response.without_tax_label;

				

				
				$("#rcp_registration_form > div.rcp_registration_total > table > tfoot > tr.rcp-vat > th").text(vat_label);

				if(level_price <= 0) {
					$(".rcp-vat").hide();
					$(".rcp-total-tax-inc").hide();
					return;
				}
				
				$(".rcp-vat").show();
				$(".rcp-total-tax-inc").show();

				var totalBeforeTax=$("#rcp-vat-total").data('value');
				var VATAmount = totalBeforeTax * country_rate / 100;
				var totalTaxInc=totalBeforeTax + VATAmount;

				VATAmount=VATAmount.toFixed(2);
				totalTaxInc=totalTaxInc.toFixed(2);
				$("#rcp-vat-amount").text(VATAmount+'€');
				$("#rcp-vat-total").text(totalTaxInc+'€ '+with_tax_label);
				
				var totalNoTax=$("#rcp-vat-total-no-tax").text();
				if(totalNoTax.indexOf(without_tax_label) <=0) {
					$("#rcp-vat-total-no-tax").text(totalNoTax+' '+without_tax_label);
				}
				var recurringNoTax=$("#rcp-vat-recurring-total-no-tax").text();
				if(recurringNoTax.indexOf(without_tax_label) <=0) {
					$("#rcp-vat-recurring-total-no-tax").text(recurringNoTax+' '+without_tax_label);
				}
			});
		}

		$('body').on('change', '#billing_country', function() {
			//updateVATCells($(this));
			rcp_vat_calc_total();
		});

		$('.rcp_level').change(function() {

			// $('.rcp_level').delay( 1800 );
			rcp_vat_calc_total();
		});

		$(document.getElementById('rcp_auto_renew')).on('change', rcp_vat_calc_total);
		$('body').on('rcp_discount_change rcp_level_change rcp_gateway_change', rcp_vat_calc_total);

		function rcp_vat_calc_total() {

			setTimeout(function() {
				$('.rcp_level').ready(function() {
					// Handler for .ready() called.
					updateVATCells($('#billing_country'));
				});

			}, 100);
		}
		
		
		rcp_vat_calc_total();
	});

})(jQuery);
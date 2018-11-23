<?php
/**
 * Invoice
 *
 * Template for displaying invoice details.
 *
 * For modifying this template, please see: http://docs.restrictcontentpro.com/article/1738-template-files
 *
 * @package     Restrict Content Pro
 * @subpackage  Templates/Invoice
 * @copyright   Copyright (c) 2017, Restrict Content Pro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

global $rcp_options, $rcp_payment, $rcp_member, $rcp_payments_db; ?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="HandheldFriendly" content="true" />

	<!-- Title -->
	<title><?php printf( __( 'Invoice %s', 'rcp' ), $rcp_payment->id ); ?></title>

	<!-- CSS -->
	<style>
	* {
		box-sizing: border-box;
		moz-box-sizing: border-box;
		webkit-box-sizing: border-box;
	}
	html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td {
		background: transparent;
		border: 0;
		font-size: 100%;
		margin: 0;
		outline: 0;
		padding: 0;
		vertical-align: baseline;
	}
	body {
		line-height: 1;
	}
	ol,ul {
		list-style: none;
	}
	blockquote,q {
		quotes: none;
	}
	blockquote:before,blockquote:after,q:before,q:after {
		content: none;
	}
	:focus {
		outline: 0;
	}
	ins {
		text-decoration: none;
	}
	del {
		text-decoration: line-through;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}
	header,footer,aside,nav,article {
		display: block;
	}
	html,body {
		webkit-font-smoothing: antialiased;
	}
	body {
		color: #555;
		font: 0.75em/160% Arial,sans-serif;
		margin: 0 auto;
		overflow-x: none;
		webkit-text-size-adjust: 100%;
		width: 595px;
	}
	#main {
		clear: both;
		float: left;
		width: 100%;
	}
	.alignleft {
		float: left;
		width: 50%;
	}
	.alignright {
		float: right;
		width: 50%;
	}
	section {
		clear: both;
		float: left;
		width: 100%;
	}
	section header {
		background: #efebeb;
		border-bottom: 1px solid #ddd;
		border-top: 1px solid #ddd;
		color: #555;
		float: left;
		font-size: 14px;
		height: 38px;
		line-height: 38px;
		padding: 0 0 0 20px;
		text-transform: uppercase;
		width: 100%;
	}
	section article {
		clear: both;
		float: left;
		width: 100%;
	}
	p {
		font-size: 14px;
		font-weight: 400;
		line-height: 20px;
		moz-word-wrap: break-word;
		ms-word-wrap: break-word;
		word-wrap: break-word;
	}
	header#header {
		float: left;
		margin: 30px 0;
		width: 100%;
	}
	header#header .alignleft img {
		float: left;
	}
	header#header .alignright h1 {
		color: #555;
		font-size: 18px;
		font-weight: 400;
		line-height: 1;
		text-align: right;
	}
	section#contacts article {
		float: left;
		padding: 20px;
		width: 100%;
	}
	section#contacts .alignright {
		border-left: 1px solid #ddd;
	}
	section#items table {
		clear: both;
		float: left;
		width: 100%;
	}
	section#items table tbody tr td {
		border-bottom: 1px solid #ddd;
		font-size: 14px;
		line-height: 60px;
	}
	section#items table tbody tr td.name {
		padding: 0 20px;
	}
	section#items table tbody tr td.price {
		padding: 0 20px;
		text-align: right;
		width: 70px;
	}
	section#items table tfoot tr td {
		font-size: 14px;
		line-height: 35px;
	}
	section#items table tfoot tr td.name {
		text-align: right;
	}
	section#items table tfoot tr td.price {
		padding: 0 20px;
		text-align: right;
	}
	section#additional-info header {
		border: none;
		margin: 0 0 30px 0;
	}
	section#additional-info .alignright {
		margin: 60px 0 0 0;
		text-align: right;
	}
	img {
		max-width: 100%;
	}
	@media print  {
		.print {
			display: none;
		}
	}
	</style>
</head>

<body>
	<div id="main">
		<header id="header">
			<!-- Logo -->
			<div class="logo">
				<?php if ( ! empty( $rcp_options['invoice_logo'] ) ) : ?>
					<img src="<?php echo esc_attr( $rcp_options['invoice_logo'] ); ?>" />
				<?php endif; ?>
			</div>

			<!-- Invoice Details -->
			<div class="alignright">
				<h1><?php printf( __( 'Invoice %s', 'rcp' ), $rcp_payment->id ); ?></h1>
			</div>

			<?php if( ! empty( $rcp_options['invoice_header'] ) ) : ?>
				<p><?php echo $rcp_options['invoice_header']; ?></p>
			<?php endif; ?>
		</header>

		<section id="contacts">
			<div class="alignleft">
				<header><?php printf( __( 'Invoice %s', 'rcp' ), $rcp_payment->id ); ?></header>

				<article>
					<?php if ( ! empty( $rcp_options['invoice_company'] ) ) : ?>
						<p><strong><?php echo $rcp_options['invoice_company']; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $rcp_options['invoice_name'] ) ) : ?>
						<p><strong><?php echo $rcp_options['invoice_name']; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $rcp_options['invoice_address'] ) ) : ?>
						<p><strong><?php echo $rcp_options['invoice_address']; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $rcp_options['invoice_address_2'] ) ) : ?>
						<p><strong><?php echo $rcp_options['invoice_address_2']; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $rcp_options['invoice_city_state_zip'] ) ) : ?>
						<p><strong><?php echo $rcp_options['invoice_city_state_zip']; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $rcp_options['invoice_email'] ) ) : ?>
						<p><strong><?php echo $rcp_options['invoice_email']; ?></strong></p>
					<?php endif; ?>

				</article>
			</div>

			<div class="alignright">
				<?php
				$user_id=$rcp_member->ID;
				$company=get_user_meta($user_id, 'rcp_company_name', true);
				$vat_number=get_user_meta($user_id, 'rcp_company_vat_number', true);
				$billing_address = get_user_meta($user_id, 'billing_address_1', true);
				$billing_city = get_user_meta($user_id, 'billing_city', true);
				$billing_postcode = get_user_meta($user_id, 'billing_postcode', true);
				$billing_country = get_user_meta($user_id, 'billing_country', true); 
				?>
				<header><?php _e( 'Bill To:', 'rcp' ); ?></header>

				<article>
					<p><strong><?php echo $rcp_member->first_name . ' ' . $rcp_member->last_name; ?></strong></p>
					<p><strong><?php echo $rcp_member->user_email; ?></strong></p>
					<?php if ( ! empty( $company) ) : ?>
						<p><strong><?php echo $company; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $billing_address) ) : ?>
						<p><strong><?php echo $billing_address; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $billing_city) ) : ?>
						<p><strong><?php echo $billing_city; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $billing_poscode) ) : ?>
						<p><strong><?php echo $billing_postcode; ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $billing_country) ) : ?>
						<p><strong><?php echo $billing_country; ?></strong></p>
					<?php endif; ?>
					<?php
					/**
					 * Insert content after the member's name and email.
					 *
					 * @param object     $rcp_payment Payment object from the database.
					 * @param RCP_Member $rcp_member  Member object.
					 */
					do_action( 'rcp_invoice_bill_to', $rcp_payment, $rcp_member );
					?>
				</article>

			</div>
		</section>

		<!-- Items -->
		<section id="items">

			<header><?php _e( 'Invoice Items:', 'rcp' ); ?></header>

			<table>
				<tbody>
					<tr>
						<td class="name"><?php echo $rcp_payment->subscription; ?></td>
						<td class="price"><?php echo rcp_currency_filter( $rcp_payment->amount ); ?></td>
					</tr>
					<?php do_action( 'rcp_invoice_items', $rcp_payment ); ?>
				</tbody>
				<tfoot>
					<?php do_action( 'rcp_invoice_items_before_total_price', $rcp_payment ); ?>
					<?php
					 $payment_id=$rcp_payment->id;
					 $vat_rate=$rcp_payments_db->get_meta( $payment_id, $key = 'vat_rate',  $unique = true );
					 if (empty($vat_rate)) {$vat_rate=0; }
					 $vat_amount=$rcp_payments_db->get_meta( $payment_id, $key = 'vat_amount',  $unique = true );
					 $amount_tax_inc=$rcp_payments_db->get_meta( $payment_id, $key = 'amount_tax_inc',  $unique = true );

					?>
					<!-- Total excluding tax -->
					<tr>
						<td class="name"><?php _e( 'Total Price excluding Tax:', 'rcp' ); ?></td>
						<td class="price"><?php echo rcp_currency_filter( $rcp_payment->amount ); ?></td>
					</tr>

					<!-- VAT -->
					<tr>
						<td class="name"><?php _e( 'VAT', 'rcp' ); ?> (<?php echo $vat_rate;?>%):</td>
						<td class="price"><?php echo rcp_currency_filter( $vat_amount ); ?></td>
					</tr>

					<!-- Total excluding tax -->
					<tr>
						<td class="name"><?php _e( 'Total Price including Tax:', 'rcp' ); ?></td>
						<td class="price"><?php echo rcp_currency_filter( $amount_tax_inc ); ?></td>
					</tr>

					<!-- Paid -->
					<tr>
						<td class="name"><?php _e( 'Payment Status:', 'rcp' ); ?></td>
						<td class="price"><?php echo rcp_get_payment_status_label( $rcp_payment ); ?></td>
					</tr>
				</tfoot>
			</table>
		</section>

		<!-- Additional Info -->
		<section id="additional-info">
			<div class="">
				<header><?php _e( 'Additional Info:', 'rcp' ); ?></header>

				

				<?php if ( in_array( $rcp_payment->status, array( 'complete', 'refunded' ) ) ) : ?>
					<article>
						<p><?php echo __( 'Payment Date:', 'rcp' ) . ' ' . date_i18n( get_option( 'date_format' ), strtotime( $rcp_payment->date, current_time( 'timestamp' ) ) ); ?></p>
					</article>
				<?php endif; ?>

				<?php if( ! empty( $rcp_options['invoice_notes'] ) ) : ?>
					<article>
						<?php echo wpautop( wp_kses_post( $rcp_options['invoice_notes'] ) ); ?>
					</article>
				<?php endif; ?>

				<?php do_action( 'rcp_invoice_additional_info', $rcp_payment ); ?>
			</div>
			<?php if ( ! empty( $vat_number) ) : ?>
				<p><strong>
					<?php echo __('VAT intra-community number:').' '.$vat_number; ?>
				</strong></p>
			<?php endif; ?>
		</section>

		<?php do_action( 'rcp_invoice_after_additional_info', $rcp_payment ); ?>

		<footer id="footer">
			<?php if( ! empty( $rcp_options['invoice_footer'] ) ) : ?>
				<p><?php echo $rcp_options['invoice_footer']; ?></p>
			<?php endif; ?>
			<p class="print alignright"><a href="#" onclick="window.print()"><?php _e( 'Print', 'rcp' ); ?></a></p>
		</footer>
	</div>
</body>
</html>
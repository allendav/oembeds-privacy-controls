<?php

class Allendav_Providers_Table extends WP_List_Table {

	public function get_columns() {
		$columns = array(
			'cb'          => '<input type="checkbox" />',
			'provider'    => __( 'Provider', 'allendav-oembeds-privacy' ),
			'description' => __( 'Description', 'allendav-oembeds-privacy' ),
		);
		return $columns;
	}

	protected function get_bulk_actions() {
		return array(
			'enable'  => __( 'Enable', 'allendav-oembeds-privacy' ),
			'disable' => __( 'Disable', 'allendav-oembeds-privacy' ),
		);
	}

	public function prepare_items() {
		$this->_column_headers = array( $this->get_columns(), array(), array() );
		$this->items = array();

		$providers = Allendav_OEmbeds_Privacy::getInstance()->provider_map();
		foreach( (array) $providers as $key => $value ) {
			$provider = array(
				'ID' => $key,
				'provider' => $value['provider'],
				'description' => $value['description'],
			);
			$this->items[] = $provider;
		}

		$this->set_pagination_args( [
			'total_items' => count( $providers ),
			'per_page'    => count( $providers ),
		] );
	}

	public function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="provider_id[]" value="%1$s" />', esc_attr( $item['ID'] ) );
	}

	public function column_provider( $item ) {
		$row_actions = array(
			'enable' => '<div>' . __( 'Enable', 'allendav-oembeds-privacy' ) . '</div>',
		);

		return sprintf( '%1$s %2$s', $item['provider'], $this->row_actions( $row_actions ) );
	}

	public function column_default( $item, $column_name ) {
		return $item[$column_name];
	}
}

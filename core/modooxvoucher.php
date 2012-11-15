<?php

class modoOxVoucher extends modoOxVoucher_parent
{

	public function markAsUsed( $sOrderId, $sUserId, $dDiscount )
    {
    	$res = parent::markAsUsed( $sOrderId, $sUserId, $dDiscount);

    	if($this->oxvouchers__oxid->value && $this->getSerie()->oxvoucherseries__modoiscreditvoucher->value == '1') {
    		//copy and reduce
    		if($dDiscount < $this->oxvouchers__modocredit->value) {
    			//there is an remaining value, create a new voucher with the remaining value
    			$dRemainderValue = $this->oxvouchers__modocredit->value - $dDiscount;
    			$this->_createCloneForRemainder($dRemainderValue);
    		}
    	}

    	return $res;
    }

    protected function _createCloneForRemainder($dRemainderValue) {
    	$oNewVoucher = oxnew('oxVoucher');
		$oNewVoucher->oxvouchers__oxvouchernr->value = $this->oxvouchers__oxvouchernr->value;
		$oNewVoucher->oxvouchers__oxvoucherserieid->value = $this->oxvouchers__oxvoucherserieid->value;
		$oNewVoucher->oxvouchers__modocredit->value = $dRemainderValue;
		$oNewVoucher->save();
		return $oNewVoucher;
    }
 
    public function save() {

    	if($this->getSerie()->oxvoucherseries__modoiscreditvoucher->value == '1' && !$this->oxvouchers__modocredit->value) {
    		//fill creditvalue if still emtpy (e.g. after creation)
    		$this->oxvouchers__modocredit->value = $this->getSerie()->oxvoucherseries__oxdiscount->value;
    	}
    	return parent::save();
    }


    protected function _getGenericDiscoutValue( $dPrice )
    {
    	if($this->getSerie()->oxvoucherseries__modoiscreditvoucher->value == '1'){
            $oCur = $this->getConfig()->getActShopCurrencyObject();
            $dDiscount = $this->oxvouchers__modocredit->value * $oCur->rate;
    	}else{
    		$dDiscount = parent::_getGenericDiscoutValue( $dPrice);

    	}

        if ( $dDiscount > $dPrice ) {
            $dDiscount = $dPrice;
        }

    	return $dDiscount;

    }

}
<?php

namespace frontend\models;

use Yii;
use common\models\RgnCity as BaseCity;
use frontend\models\operation\RgnCityOperation;
use frontend\models\RgnProvince;
use frontend\models\RgnDistrict;
use frontend\models\RgnPostcode;

/**
 * Description of RgnCity
 *
 * @author fredy
 *
 * @property \frontend\models\RgnCountry $country
 * @property \frontend\models\RgnProvince $province
 *
 * @property \frontend\models\RgnDistrict[] $rgnDistricts
 * @property \frontend\models\RgnPostcode[] $rgnPostcodes
 */
class RgnCity extends BaseCity
{

	public function init()
	{
		parent::init();

		$this->operation = new RgnCityOperation([
			'model' => $this
		]);

	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProvince()
	{
		return $this->hasOne(RgnProvince::className(), ['id' => 'province_id']);

	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRgnDistricts()
	{
		return $this
				->hasMany(RgnDistrict::className(), ['city_id' => 'id'])
				->andFilterWhere(['like', 'status', RgnDistrict::STATUS_ACTIVE]);

	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRgnPostcodes()
	{
		return $this
				->hasMany(RgnPostcode::className(), ['city_id' => 'id'])
				->andFilterWhere(['like', 'status', RgnPostcode::STATUS_ACTIVE]);

	}

}
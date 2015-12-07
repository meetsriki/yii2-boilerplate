<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Religion;

/**
 * ReligionSearch represents the model behind the search form about `frontend\models\Religion`.
 */
class ReligionSearch extends Religion
{

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'created_at', 'updated_at', 'deleted_at', 'createdBy_id', 'updatedBy_id', 'deletedBy_id'], 'integer'],
			[['status', 'name'], 'safe'],
		];

	}

	/**
	 * @inheritdoc
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();

	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = Religion::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate())
		{
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id'			 => $this->id,
			'created_at'	 => $this->created_at,
			'updated_at'	 => $this->updated_at,
			'deleted_at'	 => $this->deleted_at,
			'createdBy_id'	 => $this->createdBy_id,
			'updatedBy_id'	 => $this->updatedBy_id,
			'deletedBy_id'	 => $this->deletedBy_id,
		]);

		$query->andFilterWhere(['like', 'status', $this->status])
			->andFilterWhere(['like', 'name', $this->name]);

		return $dataProvider;

	}

	/**
	 * Create query instance for general searching
	 *
	 * @return ActiveQuery the newly created [[ActiveQuery]] instance.
	 */
	public function findModel($params)
	{
		$query = Religion::find();

		$this->load($params);

		if (!$this->validate())
		{
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $query;
		}

		$query->andFilterWhere([
			'id'			 => $this->id,
			'createdBy_id'	 => $this->createdBy_id,
			'updatedBy_id'	 => $this->updatedBy_id,
			'deletedBy_id'	 => $this->deletedBy_id,
		]);

		$query->andFilterWhere(['like', 'name', $this->name]);

		return $query;

	}

	/**
	 * Creates data provider instance for active Religion with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function searchActive($params)
	{
		$query = $this->findModel($params);

		$query->andFilterWhere(['like', 'status', Religion::STATUS_ACTIVE]);

		return new ActiveDataProvider([
			'query' => $query,
		]);

	}

	/**
	 * Creates data provider instance for active Religion with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function searchDeleted($params)
	{
		$query = $this->findModel($params);

		$query->andFilterWhere(['like', 'status', Religion::STATUS_DELETED]);

		return new ActiveDataProvider([
			'query' => $query,
		]);

	}

}

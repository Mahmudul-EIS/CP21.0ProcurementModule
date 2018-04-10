<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrAutoItems Model
 *
 * @property \App\Model\Table\PrAutosTable|\Cake\ORM\Association\BelongsTo $PrAutos
 * @property \App\Model\Table\BomPartsTable|\Cake\ORM\Association\BelongsTo $BomParts
 *
 * @method \App\Model\Entity\PrAutoItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrAutoItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrAutoItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrAutoItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrAutoItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrAutoItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrAutoItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrAutoItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pr_auto_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PrAutos', [
            'foreignKey' => 'pr_auto_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('bom_part_id')
            ->requirePresence('bom_part_id', 'create')
            ->notEmpty('bom_part_id');

        $validator
            ->integer('order_qty')
            ->requirePresence('order_qty', 'create')
            ->notEmpty('order_qty');

        $validator
            ->scalar('supplier')
            ->maxLength('supplier', 50)
            ->allowEmpty('supplier');

        $validator
            ->integer('sub_total')
            ->requirePresence('sub_total', 'create')
            ->notEmpty('sub_total');

        $validator
            ->integer('gst')
            ->allowEmpty('gst');

        $validator
            ->integer('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->scalar('docs')
            ->maxLength('docs', 255)
            ->allowEmpty('docs');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmpty('remark');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['pr_auto_id'], 'PrAutos'));

        return $rules;
    }
}

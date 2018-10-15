<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cruces Model
 *
 * @property \App\Model\Table\DetalleAntenasTable|\Cake\ORM\Association\HasMany $DetalleAntenas
 * @property \App\Model\Table\DetallePostesTable|\Cake\ORM\Association\HasMany $DetallePostes
 * @property \App\Model\Table\DetalleSemaforosTable|\Cake\ORM\Association\HasMany $DetalleSemaforos
 * @property \App\Model\Table\DetalleSwitchesTable|\Cake\ORM\Association\HasMany $DetalleSwitches
 * @property \App\Model\Table\ReguladoresTable|\Cake\ORM\Association\HasMany $Reguladores
 *
 * @method \App\Model\Entity\Cruce get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cruce newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cruce[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cruce|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cruce|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cruce patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cruce[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cruce findOrCreate($search, callable $callback = null, $options = [])
 */
class CrucesTable extends Table
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

        $this->setTable('cruces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('DetalleAntenas', [
            'foreignKey' => 'cruce_id'
        ]);
        $this->hasMany('DetallePostes', [
            'foreignKey' => 'cruce_id'
        ]);
        $this->hasMany('DetalleSemaforos', [
            'foreignKey' => 'cruce_id'
        ]);
        $this->hasMany('DetalleSwitches', [
            'foreignKey' => 'cruce_id'
        ]);
        $this->hasMany('Reguladores', [
            'foreignKey' => 'cruce_id'
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
            ->scalar('codigoCruce')
            ->maxLength('codigoCruce', 10)
            ->requirePresence('codigoCruce', 'create')
            ->notEmpty('codigoCruce');

        $validator
            ->scalar('codigoPunto')
            ->maxLength('codigoPunto', 45)
            ->allowEmpty('codigoPunto');

        $validator
            ->scalar('suministro')
            ->maxLength('suministro', 45)
            ->allowEmpty('suministro');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 45)
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        return $validator;
    }
}
